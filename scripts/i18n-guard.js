#!/usr/bin/env node
/* Prevent localization of selectors and phone numbers */

import fs from 'fs';

const files = process.argv.slice(2);
if (!files.length) process.exit(0);

// Arabic Unicode block
const ARABIC = /[\u0600-\u06FF]/;

// forbidden cases
const BAD_ATTR = /\b(?:class|id|data-[\w-]+)\s*=\s*["'][^"']*__\(/i;
const ARABIC_ATTR = /\b(?:class|id|data-[\w-]+)\s*=\s*["'][^"']*[\u0600-\u06FF]/u;
const BAD_JS_SELECTOR = /\b(querySelector(All)?|getElementById|getElementsByClassName)\s*\(\s*__\(/;
const BAD_JQ_SELECTOR = /\$\s*\(\s*__\(/;
const BAD_TEL_I18N = /\bhref\s*=\s*["']\s*tel:\s*[^"']*__\(/i;
const BAD_TEL_NONASCII = /\bhref\s*=\s*["']\s*tel:\s*[^"'\x30-\x39\+\s-]/i;

const errors = [];

for (const file of files) {
  if (!/\.(php|blade\.php|js|ts|vue)$/.test(file)) continue;
  if (!fs.existsSync(file)) continue;

  const src = fs.readFileSync(file, 'utf8');

  if (BAD_ATTR.test(src)) errors.push(`${file}: class/id/data-* contains __('…')`);
  if (ARABIC_ATTR.test(src)) errors.push(`${file}: class/id/data-* contains Arabic letters`);
  if (BAD_JS_SELECTOR.test(src)) errors.push(`${file}: JS selector built with __('…')`);
  if (BAD_JQ_SELECTOR.test(src)) errors.push(`${file}: jQuery selector built with __('…')`);
  if (BAD_TEL_I18N.test(src)) errors.push(`${file}: tel: link wrapped in __('…')`);
  if (BAD_TEL_NONASCII.test(src)) errors.push(`${file}: tel: link contains non-ASCII digits`);
}

if (errors.length) {
  console.error('\n❌ i18n Guard Failed:\n');
  errors.forEach(e => console.error(' - ' + e));
  console.error('\nRules:\n• Never localize selectors (class/id/data-*)\n• Never localize JS selectors\n• Phone numbers must stay ASCII-only\n');
  process.exit(1);
}

process.exit(0);
