<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductVariants;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'Dế Mèn Phiêu Lưu Ký',
                'slug' => 'de-men-phieu-luu-ky',
                'description' => 'Tác phẩm văn học thiếu nhi nổi tiếng của Tô Hoài.',
                'type' => 'simple',
                'tag' => 'thiếu nhi,văn học',
                'publisher_id' => 3,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'DMPLK001', 'price' => 45000, 'stock' => 50, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Tuổi Trẻ Đáng Giá Bao Nhiêu',
                'slug' => 'tuoi-tre-dang-gia-bao-nhieu',
                'description' => 'Tác phẩm truyền cảm hứng dành cho giới trẻ.',
                'type' => 'simple',
                'tag' => 'truyền cảm hứng,tâm lý',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'TTDGBN001', 'price' => 60000, 'stock' => 30, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Nhà Giả Kim',
                'slug' => 'nha-gia-kim',
                'description' => 'Cuốn tiểu thuyết nổi tiếng của Paulo Coelho.',
                'type' => 'simple',
                'tag' => 'văn học,tâm linh',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'NGK001', 'price' => 70000, 'stock' => 40, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Đắc Nhân Tâm',
                'slug' => 'dac-nhan-tam',
                'description' => 'Cuốn sách kỹ năng sống kinh điển mọi thời đại.',
                'type' => 'simple',
                'tag' => 'kỹ năng sống,phát triển bản thân',
                'publisher_id' => 1,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa cứng', 'code' => 'DNT001', 'price' => 90000, 'stock' => 60, 'type' => 'hardcover'],
                ],
            ],
            [
                'title' => '7 Thói Quen Hiệu Quả',
                'slug' => '7-thoi-quen-hieu-qua',
                'description' => 'Cuốn sách phát triển kỹ năng và tư duy tích cực.',
                'type' => 'simple',
                'tag' => 'phát triển bản thân,kỹ năng sống',
                'publisher_id' => 1,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => '7TQHQ001', 'price' => 85000, 'stock' => 45, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Mắt Biếc',
                'slug' => 'mat-biec',
                'description' => 'Một trong những tác phẩm nổi bật của nhà văn Nguyễn Nhật Ánh.',
                'type' => 'simple',
                'tag' => 'văn học,tiểu thuyết',
                'publisher_id' => 3,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'MB001', 'price' => 50000, 'stock' => 40, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Totto-Chan Bên Cửa Sổ',
                'slug' => 'totto-chan-ben-cua-so',
                'description' => 'Câu chuyện cảm động về một cô bé tại trường Tomoe.',
                'type' => 'simple',
                'tag' => 'văn học,thiếu nhi',
                'publisher_id' => 3,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa cứng', 'code' => 'TCBCS001', 'price' => 65000, 'stock' => 35, 'type' => 'hardcover'],
                ],
            ],
            [
                'title' => 'Sherlock Holmes Toàn Tập',
                'slug' => 'sherlock-holmes-toan-tap',
                'description' => 'Bộ truyện trinh thám nổi tiếng của Arthur Conan Doyle.',
                'type' => 'simple',
                'tag' => 'trinh thám,văn học',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Hộp bộ', 'code' => 'SHTT001', 'price' => 250000, 'stock' => 20, 'type' => 'hardcover'],
                ],
            ],
            [
                'title' => 'Sapiens: Lược Sử Loài Người',
                'slug' => 'sapiens-luoc-su-loai-nguoi',
                'description' => 'Cuốn sách nổi tiếng về lịch sử tiến hóa của loài người.',
                'type' => 'simple',
                'tag' => 'khoa học,xã hội',
                'publisher_id' => 4,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'SLSLN001', 'price' => 120000, 'stock' => 25, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Đi Tìm Lẽ Sống',
                'slug' => 'di-tim-le-song',
                'description' => 'Cuốn sách sâu sắc của Viktor E. Frankl.',
                'type' => 'simple',
                'tag' => 'tâm lý,hành trình sống',
                'publisher_id' => 1,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'DTLS001', 'price' => 85000, 'stock' => 28, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Cà Phê Cùng Tony',
                'slug' => 'ca-phe-cung-tony',
                'description' => 'Sách truyền cảm hứng với văn phong dí dỏm, sâu sắc.',
                'type' => 'simple',
                'tag' => 'truyền cảm hứng,văn học',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'CPCT001', 'price' => 79000, 'stock' => 40, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Muôn Kiếp Nhân Sinh',
                'slug' => 'muon-kiep-nhan-sinh',
                'description' => 'Tác phẩm nói về luân hồi và sự chuyển hóa trong kiếp người.',
                'type' => 'simple',
                'tag' => 'tâm linh,trải nghiệm',
                'publisher_id' => 1,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'MKNS001', 'price' => 99000, 'stock' => 32, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Đời Ngắn Đừng Ngủ Dài',
                'slug' => 'doi-ngan-dung-ngu-dai',
                'description' => 'Lời nhắc nhở hãy sống trọn từng giây.',
                'type' => 'simple',
                'tag' => 'kỹ năng sống,truyền cảm hứng',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'DNDND001', 'price' => 58000, 'stock' => 37, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Trên Đường Băng',
                'slug' => 'tren-duong-bang',
                'description' => 'Tiếp tục những trải nghiệm thực tế truyền cảm hứng sống tích cực.',
                'type' => 'simple',
                'tag' => 'truyền cảm hứng,phát triển bản thân',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'TDB001', 'price' => 62000, 'stock' => 33, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Bí Mật Tư Duy Triệu Phú',
                'slug' => 'bi-mat-tu-duy-trieu-phu',
                'description' => 'Cẩm nang thay đổi tư duy để thành công.',
                'type' => 'simple',
                'tag' => 'tư duy tài chính,phát triển bản thân',
                'publisher_id' => 1,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'BMTDTP001', 'price' => 87000, 'stock' => 30, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Hành Trình Về Phương Đông',
                'slug' => 'hanh-trinh-ve-phuong-dong',
                'description' => 'Cuốn sách nổi tiếng mở ra tư duy về phương Đông huyền bí.',
                'type' => 'simple',
                'tag' => 'triết học,tâm linh',
                'publisher_id' => 4,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'HTVPD001', 'price' => 99000, 'stock' => 22, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Tâm Hồn Cao Thượng',
                'slug' => 'tam-hon-cao-thuong',
                'description' => 'Tác phẩm nhân văn được yêu thích từ mọi lứa tuổi.',
                'type' => 'simple',
                'tag' => 'văn học,giáo dục',
                'publisher_id' => 3,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa cứng', 'code' => 'THCT001', 'price' => 69000, 'stock' => 36, 'type' => 'hardcover'],
                ],
            ],
            [
                'title' => 'Cha Giàu Cha Nghèo',
                'slug' => 'cha-giau-cha-ngheo',
                'description' => 'Sách tài chính cá nhân bán chạy nhất mọi thời đại.',
                'type' => 'simple',
                'tag' => 'tài chính,cá nhân',
                'publisher_id' => 1,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'CGCN001', 'price' => 110000, 'stock' => 34, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Một Lít Nước Mắt',
                'slug' => 'mot-lit-nuoc-mat',
                'description' => 'Câu chuyện cảm động của cô gái trẻ mắc bệnh hiểm nghèo.',
                'type' => 'simple',
                'tag' => 'tiểu thuyết,tự truyện',
                'publisher_id' => 3,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'MLNM001', 'price' => 56000, 'stock' => 29, 'type' => 'paperback'],
                ],
            ],
            [
                'title' => 'Bố Già',
                'slug' => 'bo-gia',
                'description' => 'Tác phẩm tiểu thuyết kinh điển của Mario Puzo.',
                'type' => 'simple',
                'tag' => 'tiểu thuyết,kinh điển',
                'publisher_id' => 2,
                'is_active' => true,
                'variants' => [
                    ['name' => 'Bìa mềm', 'code' => 'BG001', 'price' => 98000, 'stock' => 27, 'type' => 'paperback'],
                ],
            ],
            // Thêm tiếp 22 sản phẩm mẫu dưới đây
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'type' => $data['type'],
                'tag' => $data['tag'],
                'publisher_id' => $data['publisher_id'],
                'is_active' => $data['is_active'],
            ]);

            foreach ($data['variants'] as $variant) {
                ProductVariants::create([
                    'product_id' => $product->row_id,
                    'code' => $variant['code'],
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'stock' => $variant['stock'],
                    'type' => $variant['type'],
                ]);
            }
        }
    }
}