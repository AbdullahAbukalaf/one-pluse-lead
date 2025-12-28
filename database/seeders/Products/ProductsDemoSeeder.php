<?php

namespace Database\Seeders\Products;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\Product;;

use App\Models\Categories;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductAdditionalInformation;
use App\Models\Products\ProductsRecentWork;
use App\Models\Products\ProductsWhyChooseUs;

class ProductsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories (ensure slugs exist)
        $cats = [
            ['title_en' => 'Indoor Light',  'title_ar' => 'إنارة داخلية', 'slug' => 'indoor-light',  'sort_order' => 1],
            ['title_en' => 'Outdoor Light', 'title_ar' => 'إنارة خارجية', 'slug' => 'outdoor-light', 'sort_order' => 2],
            ['title_en' => 'Solar Light',   'title_ar' => 'إنارة شمسية',  'slug' => 'solar-light',   'sort_order' => 3],
        ];

        foreach ($cats as $c) {
            Categories::query()->updateOrCreate(
                ['slug' => $c['slug']],
                array_merge($c, [
                    'is_active' => true,
                    'banner_image' => 'resources/UI/Site/images/hero/products_banner.jpg',
                    'banner_title_en' => null,
                    'banner_title_ar' => null,
                    'banner_description_en' => null,
                    'banner_description_ar' => null,
                ])
            );
        }

        $indoor = Categories::where('slug', 'indoor-light')->first();

        // Products
        for ($i = 1; $i <= 12; $i++) {
            $p = Product::query()->create([
                'slug' => 'sample-product-' . $i,
                'title_en' => 'Sample Product ' . $i,
                'title_ar' => 'منتج تجريبي ' . $i,
                'short_description_en' => 'Short description for product ' . $i,
                'short_description_ar' => 'وصف مختصر للمنتج ' . $i,
                'description_en' => 'Long description (EN) for product ' . $i,
                'description_ar' => 'وصف طويل (AR) للمنتج ' . $i,
                'sku' => 'SKU-' . str_pad((string)$i, 4, '0', STR_PAD_LEFT),
                'brand_en' => 'Brand ' . (($i % 3) + 1),
                'brand_ar' => 'ماركة ' . (($i % 3) + 1),
                'card_image' => 'resources/UI/Site/images/products/product_img_5.png',
                'price' => ($i % 2 === 0) ? ('$' . (40 + $i)) : null,
                'spec_1_en' => 'Specification 1: Wattage: ' . (30 + $i) . 'W',
                'spec_1_ar' => 'المواصفة 1: القدرة: ' . (30 + $i) . ' واط',
                'spec_2_en' => 'Specification 2: Color Temp: 4000K',
                'spec_2_ar' => 'المواصفة 2: حرارة اللون: 4000K',
                'details_snippet_en' => 'Details: Aluminum body, long-life LED driver, IP65',
                'details_snippet_ar' => 'تفاصيل: جسم ألمنيوم، عمر طويل، IP65',
                'tags_en' => ['Energy', 'Speed', 'System'],
                'tags_ar' => ['طاقة', 'سرعة', 'نظام'],
                'sort_order' => $i,
                'is_active' => true,
            ]);

            // attach to category (demo: all indoor)
            if ($indoor) {
                $p->categories()->syncWithoutDetaching([$indoor->id]);
            }

            // Images (gallery)
            for ($g = 1; $g <= 5; $g++) {
                ProductImage::query()->create([
                    'product_id' => $p->id,
                    'image_path' => 'resources/UI/Site/images/products/product_img_1.png',
                    'sort_order' => $g,
                    'is_active' => true,
                ]);
            }

            // Additional info
            $rows = [
                ['Repair Kit Type', 'نوع عدة الإصلاح', 'Maintenance Kit', 'عدة صيانة'],
                ['Number of Pieces', 'عدد القطع', '1', '1'],
                ['Package Depth (cm)', 'عمق العبوة (سم)', '22.61 cm', '22.61 سم'],
            ];
            $o = 1;
            foreach ($rows as $r) {
                ProductAdditionalInformation::query()->create([
                    'product_id' => $p->id,
                    'label_en' => $r[0],
                    'label_ar' => $r[1],
                    'value_en' => $r[2],
                    'value_ar' => $r[3],
                    'sort_order' => $o++,
                ]);
            }
        }

        // Recent works
        ProductsRecentWork::query()->truncate();
        for ($i = 1; $i <= 4; $i++) {
            ProductsRecentWork::query()->create([
                'title_en' => 'Engine Repair ' . $i,
                'title_ar' => 'صيانة محرك ' . $i,
                'image' => 'resources/UI/Site/images/placeholder/620x890.png',
                'sort_order' => $i,
                'is_active' => true,
            ]);
        }

        // Why choose us
        ProductsWhyChooseUs::query()->truncate();
        $items = [
            ['Brake Repair', 'تصليح الفرامل', 'Short description...', 'وصف قصير...'],
            ['Engine Repair', 'صيانة المحرك', 'Short description...', 'وصف قصير...'],
            ['Tire Repair', 'تصليح الإطارات', 'Short description...', 'وصف قصير...'],
        ];
        $i = 1;
        foreach ($items as $it) {
            ProductsWhyChooseUs::query()->create([
                'title_en' => $it[0],
                'title_ar' => $it[1],
                'description_en' => $it[2],
                'description_ar' => $it[3],
                'image' => 'resources/UI/Site/images/placeholder/1920x1220.png',
                'sort_order' => $i++,
                'is_active' => true,
            ]);
        }
    }
}
