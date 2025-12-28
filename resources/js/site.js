// import your site template JS here
// resources/js/site.js
console.log('[SEARCH][REMOVE AFTER TESTING] site.js loaded');

import $ from 'jquery';
window.$ = window.jQuery = $;

function initHeaderSearchSuggest() {
  const boxes = Array.from(document.querySelectorAll('.search_box'));
  const pathMatch = (window.location.pathname || '').match(/^\/(ar|en)(\/|$)/);
  const localePrefix = pathMatch ? `/${pathMatch[1]}` : '';
  const SUGGEST_URL = `${localePrefix}/search/suggest`;

  const logDebug = (...args) => console.log('[SEARCH][REMOVE AFTER TESTING]', ...args);
  logDebug(`search boxes found: ${boxes.length}`);
  if (!boxes.length) return;

  const debounce = (fn, delay = 260) => {
    let t;
    return (...args) => {
      clearTimeout(t);
      t = setTimeout(() => fn(...args), delay);
    };
  };

  const escapeHtml = (str) => {
    return String(str ?? '')
      .replaceAll('&', '&amp;')
      .replaceAll('<', '&lt;')
      .replaceAll('>', '&gt;')
      .replaceAll('"', '&quot;')
      .replaceAll("'", '&#039;');
  };

  const escapeAttr = (str) => escapeHtml(str).replaceAll('`', '&#096;');

  boxes.forEach((box, idx) => {
    if (!box || box.dataset.searchInit === '1') {
      logDebug(`skip box ${idx} (already initialized)`);
      return;
    }

    const input = box.querySelector('.search_input');
    const btn = box.querySelector('.search_btn');
    const dropdown = box.querySelector('.search_dropdown');

    if (!input || !btn || !dropdown) {
      logDebug(`skip box ${idx} (missing pieces)`);
      return;
    }

    box.dataset.searchInit = '1';
    box.dataset.searchPreferred = 'sitejs';
    dropdown.setAttribute('role', 'listbox');
    dropdown.setAttribute('aria-expanded', 'false');

    let abortCtrl = null;
    let activeIndex = -1;
    const tag = `[box ${idx}]`;

    const hideDropdown = () => {
      dropdown.hidden = true;
      dropdown.innerHTML = '';
      dropdown.setAttribute('aria-expanded', 'false');
      activeIndex = -1;
      if (abortCtrl) {
        abortCtrl.abort();
        abortCtrl = null;
      }
    };

    const showDropdown = () => {
      dropdown.hidden = false;
      dropdown.setAttribute('aria-expanded', 'true');
    };

    const setState = (text) => {
      showDropdown();
      dropdown.innerHTML = `<div class="search_state">${escapeHtml(text)}</div>`;
      activeIndex = -1;
    };

    const renderItems = (items) => {
      if (!Array.isArray(items) || items.length === 0) {
        setState('No results');
        return;
      }

      const listHtml = items.slice(0, 8).map((p, itemIdx) => `
        <a class="search_item" href="${escapeAttr(p.url || '#')}" role="option" data-idx="${itemIdx}">
          <div class="search_thumb">
            <img class="search_item_img" src="${escapeAttr(p.image_url || '')}" alt="${escapeAttr(p.title || '')}">
          </div>
          <div class="search_item_body">
            <p class="search_item_title">${escapeHtml(p.title || '')}</p>
            <p class="search_item_desc">${escapeHtml(p.short || '')}</p>
          </div>
        </a>
      `).join('');

      dropdown.innerHTML = `<div class="search_list" role="presentation">${listHtml}</div>`;

      showDropdown();
      activeIndex = -1;
    };

    const fetchSuggest = async (q) => {
      if (abortCtrl) abortCtrl.abort();
      abortCtrl = new AbortController();

      const url = `${SUGGEST_URL}?q=${encodeURIComponent(q)}`;
      logDebug(`${tag} fetch URL: ${url}`);

      const res = await fetch(url, {
        signal: abortCtrl.signal,
        headers: { Accept: 'application/json' },
      });

      if (!res.ok) throw new Error('Suggest request failed');
      const data = await res.json();
      logDebug(`${tag} response length: ${Array.isArray(data) ? data.length : 'n/a'}`);
      return data;
    };

    const runSearch = debounce(async () => {
      const q = input.value.trim();
      logDebug(`${tag} runSearch fired with query "${q}"`);
      if (q.length < 2) { hideDropdown(); return; }

      setState('Searching...');

      try {
        const data = await fetchSuggest(q);
        // ignore outdated response
        if (input.value.trim() !== q) return;
        renderItems(data);
      } catch (e) {
        if (e.name === 'AbortError') return;
        logDebug(`${tag} error`, e);
        setState('Something went wrong');
      }
    }, 280);

    input.addEventListener('input', () => {
      logDebug(`${tag} input event`, input.value);
      runSearch();
    });

    btn.addEventListener('click', (e) => {
      e.preventDefault();
      input.focus();
      logDebug(`${tag} search button click`);
      runSearch();
    });

    document.addEventListener('click', (e) => {
      if (!box.contains(e.target)) hideDropdown();
    });

    dropdown.addEventListener('click', (e) => e.stopPropagation());

    input.addEventListener('keydown', (e) => {
      if (dropdown.hidden) return;

      const items = Array.from(dropdown.querySelectorAll('.search_item'));
      if (!items.length) return;

      if (e.key === 'Escape') { hideDropdown(); return; }

      if (e.key === 'ArrowDown') {
        e.preventDefault();
        activeIndex = Math.min(activeIndex + 1, items.length - 1);
        setActive(items, activeIndex);
      }

      if (e.key === 'ArrowUp') {
        e.preventDefault();
        activeIndex = Math.max(activeIndex - 1, 0);
        setActive(items, activeIndex);
      }

      if (e.key === 'Enter' && activeIndex >= 0) {
        e.preventDefault();
        items[activeIndex].click();
      }
    });

    input.addEventListener('blur', () => {
      setTimeout(() => {
        if (!box.contains(document.activeElement)) hideDropdown();
      }, 140);
    });

    function setActive(items, setIdx) {
      items.forEach((el) => el.classList.remove('is-active'));
      const el = items[setIdx];
      if (!el) return;
      el.classList.add('is-active');
      el.scrollIntoView({ block: 'nearest' });
    }
  });
}

// Run when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeaderSearchSuggest);
} else {
  initHeaderSearchSuggest();
}
