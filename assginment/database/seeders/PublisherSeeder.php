<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Publisher;
use App\Models\publishers;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        $publishers = [
            [
                'name' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'slug' => 'nha-xuat-ban-giao-duc-viet-nam',
                'phone' => '02438220801',
                'address' => '81 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội',
                'contact_email' => 'info@nxbgd.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Trẻ',
                'slug' => 'nha-xuat-ban-tre',
                'phone' => '02839316289',
                'address' => '161B Lý Chính Thắng, Quận 3, TP.HCM',
                'contact_email' => 'nxbtre@hcm.vnn.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Kim Đồng',
                'slug' => 'nha-xuat-ban-kim-dong',
                'phone' => '02439432754',
                'address' => '55 Quang Trung, Hai Bà Trưng, Hà Nội',
                'contact_email' => 'contact@nxbdkimdong.com.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Chính Trị Quốc Gia Sự Thật',
                'slug' => 'nha-xuat-ban-chinh-tri-quoc-gia-su-that',
                'phone' => '02438221581',
                'address' => '6/86 Duy Tân, Cầu Giấy, Hà Nội',
                'contact_email' => 'info@nxbctqg.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Tổng Hợp TP.HCM',
                'slug' => 'nha-xuat-ban-tong-hop-tphcm',
                'phone' => '02839309302',
                'address' => '62 Nguyễn Thị Minh Khai, Quận 1, TP.HCM',
                'contact_email' => 'info@nxbhcm.com.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Hội Nhà Văn',
                'slug' => 'nha-xuat-ban-hoi-nha-van',
                'phone' => '02438221406',
                'address' => '65 Nguyễn Du, Hai Bà Trưng, Hà Nội',
                'contact_email' => 'nxbhoinhavan@hn.vnn.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Lao Động',
                'slug' => 'nha-xuat-ban-lao-dong',
                'phone' => '02439449395',
                'address' => '175 Giảng Võ, Đống Đa, Hà Nội',
                'contact_email' => 'nxblaodong@hn.vnn.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Văn Hóa - Văn Nghệ TP.HCM',
                'slug' => 'nha-xuat-ban-van-hoa-van-nghe-tphcm',
                'phone' => '02838216009',
                'address' => '88-90 Ký Con, Quận 1, TP.HCM',
                'contact_email' => 'nxbvhvn@nxbvanhoavannghe.org.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Đại Học Quốc Gia Hà Nội',
                'slug' => 'nha-xuat-ban-dai-hoc-quoc-gia-ha-noi',
                'phone' => '02437547735',
                'address' => '136 Xuân Thủy, Cầu Giấy, Hà Nội',
                'contact_email' => 'hanhchinh@nxbdhsp.edu.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Phụ Nữ Việt Nam',
                'slug' => 'nha-xuat-ban-phu-nu-viet-nam',
                'phone' => '02438211854',
                'address' => '39 Hàng Chuối, Hai Bà Trưng, Hà Nội',
                'contact_email' => 'nxbphunu@hn.vnn.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Dân Trí',
                'slug' => 'nha-xuat-ban-dan-tri',
                'phone' => '02466860751',
                'address' => 'Số 9, Ngõ 26 Hoàng Cầu, Đống Đa, Hà Nội',
                'contact_email' => 'nxbdantri@gmail.com',
            ],
            [
                'name' => 'Nhà Xuất Bản Hồng Đức',
                'slug' => 'nha-xuat-ban-hong-duc',
                'phone' => '02438224896',
                'address' => '65 Tràng Thi, Hoàn Kiếm, Hà Nội',
                'contact_email' => 'hongduc@example.com',
            ],
            [
                'name' => 'Nhà Xuất Bản Văn Học',
                'slug' => 'nha-xuat-ban-van-hoc',
                'phone' => '02439425492',
                'address' => '52 Hai Bà Trưng, Hoàn Kiếm, Hà Nội',
                'contact_email' => 'vanhoc@example.com',
            ],
            [
                'name' => 'Nhà Xuất Bản Thông Tấn',
                'slug' => 'nha-xuat-ban-thong-tan',
                'phone' => '02437992145',
                'address' => '79 Lý Thường Kiệt, Hoàn Kiếm, Hà Nội',
                'contact_email' => 'info@nxbtintuc.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Xây Dựng',
                'slug' => 'nha-xuat-ban-xay-dung',
                'phone' => '02438216008',
                'address' => '37 Lê Đại Hành, Hai Bà Trưng, Hà Nội',
                'contact_email' => 'info@nxbxaydung.vn',
            ],
            [
                'name' => 'Nhà Xuất Bản Tài Chính',
                'slug' => 'nha-xuat-ban-tai-chinh',
                'phone' => '02439331230',
                'address' => '28 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội',
                'contact_email' => 'info@nxbtck.vn',
            ],
        ];

        foreach ($publishers as $publisher) {
            publishers::create($publisher);
        }
    }
}
