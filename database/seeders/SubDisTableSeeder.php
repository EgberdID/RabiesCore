<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubDisTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sub_dis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       
        DB::table('sub_dis')->insert([
            ['id' => 1, 'district_id' => 1, 'subdis_id' => '71.71.01.1001', 'name' => 'Molas', 'lat' => '1.54167', 'lng'=>'124.83444'],
            ['id' => 2, 'district_id' => 1, 'subdis_id' => '71.71.01.1006', 'name' => 'Tongkaina', 'lat'=>'1.571389','lng'=>'124.8125'],
            ['id' => 3, 'district_id' => 1, 'subdis_id' => '71.71.01.1007', 'name' => 'Meras', 'lat'=>'1.55022','lng'=>'124.82036'],
            ['id' => 4, 'district_id' => 1, 'subdis_id' => '71.71.01.1008', 'name' => 'Bailang', 'lat' => '1.532011112015962', 'lng' => '124.8541805287203'],
            ['id' => 6, 'district_id' => 1, 'subdis_id' => '71.71.01.1009', 'name' => 'Pandu', 'lat'=>'1.55472','lng'=>'124.83361'],
            ['id' => 7, 'district_id' => 2, 'subdis_id' => '71.71.02.1001', 'name' => 'Bitung Karangria', 'lat' => '1.5097974487025343', 'lng' => '124.84524074155529'],
            ['id' => 8, 'district_id' => 2, 'subdis_id' => '71.71.02.1002', 'name' => 'Tuminting', 'lat' => '1.5075078314423713', 'lng' => '124.8469727252093'],
            ['id' => 9, 'district_id' => 2, 'subdis_id' => '71.71.02.1003', 'name' => 'Tumumpa I', 'lat' => '1.5204657670715869', 'lng' => '124.84922926280301'],
            ['id' => 10, 'district_id' => 2, 'subdis_id' => '71.71.02.1004', 'name' => 'Maasing', 'lat' => '1.5177720171863578', 'lng' => '124.84595312071554'],
            ['id' => 11, 'district_id' => 2, 'subdis_id' => '71.71.02.1005', 'name' => 'Sindulang I', 'lat' => '1.5009869601456451', 'lng' => '124.84429413582177'],
            ['id' => 12, 'district_id' => 2, 'subdis_id' => '71.71.02.1006', 'name' => 'Sindulang II', 'lat' => '1.5050915435917929', 'lng' => '124.84345615941248'],
            ['id' => 13, 'district_id' => 2, 'subdis_id' => '71.71.02.1007', 'name' => 'Islam', 'lat' => '1.5042588913446868', 'lng' => '124.84541986600227'],
            ['id' => 14, 'district_id' => 2, 'subdis_id' => '71.71.02.1008', 'name' => 'Tumumpa II', 'lat' => '1.5230744051582525', 'lng' => '124.84432246763645'],
            ['id' => 15, 'district_id' => 2, 'subdis_id' => '71.71.02.1009', 'name' => 'Sumompo', 'lat' => '1.515613924079847', 'lng' => '124.86107495764122'],
            ['id' => 16, 'district_id' => 2, 'subdis_id' => '71.71.02.1010', 'name' => 'Mahawu', 'lat' => '1.5190335281510663', 'lng' => '124.85236558413516'],
            ['id' => 17, 'district_id' => 3, 'subdis_id' => '71.71.03.1001', 'name' => 'Singkil I', 'lat' => '1.5007332242687281', 'lng' => '124.84970345080806'],
            ['id' => 18, 'district_id' => 3, 'subdis_id' => '71.71.03.1002', 'name' => 'Singkil II', 'lat' => '1.503250049348122', 'lng' => '124.85525625080822'],
            ['id' => 19, 'district_id' => 3, 'subdis_id' => '71.71.03.1003', 'name' => 'Wawonasa', 'lat' => '1.4947532731206925', 'lng' => '124.84881553835663'],
            ['id' => 20, 'district_id' => 3, 'subdis_id' => '71.71.03.1004', 'name' => 'Karame', 'lat' => '1.490952500945792', 'lng' => '124.85025626430085'],
            ['id' => 21, 'district_id' => 3, 'subdis_id' => '71.71.03.1005', 'name' => 'Ketang Baru', 'lat' => '1.489117676694487', 'lng' => '124.85202113731556'],
            ['id' => 22, 'district_id' => 3, 'subdis_id' => '71.71.03.1006', 'name' => 'Ternate Baru', 'lat' => '1.4921225512732816', 'lng' => '124.85487063731557'],
            ['id' => 23, 'district_id' => 3, 'subdis_id' => '71.71.03.1007', 'name' => 'Kombos Barat', 'lat' => '1.4939183763386672', 'lng' => '124.85452963916616'],
            ['id' => 24, 'district_id' => 3, 'subdis_id' => '71.71.03.1008', 'name' => 'Kombos Timur', 'lat' => '1.5046951337278955', 'lng' => '124.86542756238416'],
            ['id' => 25, 'district_id' => 3, 'subdis_id' => '71.71.03.1009', 'name' => 'Ternate Tanjung', 'lat' => '1.490373427845514', 'lng' => '124.86010281033042'],
            ['id' => 26, 'district_id' => 4, 'subdis_id' => '71.71.04.1002', 'name' => 'Mahakeret Timur', 'lat' => '1.4851801939278166', 'lng' => '124.84427302211118'],
            ['id' => 27, 'district_id' => 4, 'subdis_id' => '71.71.04.1003', 'name' => 'Mahakeret Barat', 'lat' => '1.482769924724752', 'lng' => '124.84107216615124'],
            ['id' => 28, 'district_id' => 4, 'subdis_id' => '71.71.04.1004', 'name' => 'Teling Bawah', 'lat' => '1.4804374036126764', 'lng' => '124.84416975080816'],
            ['id' => 29, 'district_id' => 4, 'subdis_id' => '71.71.04.1005', 'name' => 'Wenang Utara', 'lat' => '1.4849867798038345', 'lng' => '124.83914186615138'],
            ['id' => 30, 'district_id' => 4, 'subdis_id' => '71.71.04.1006', 'name' => 'Wenang Selatan', 'lat' => '1.4865906525583086', 'lng' => '124.83701346615132'],
            ['id' => 31, 'district_id' => 4, 'subdis_id' => '71.71.04.1007', 'name' => 'Pinaesaan', 'lat' => '1.4905239513839694', 'lng' => '124.84617326615142'],
            ['id' => 32, 'district_id' => 4, 'subdis_id' => '71.71.04.1008', 'name' => 'Calaca', 'lat' => '1.4973875515998778', 'lng' => '124.84227375265883'],

            
            ['id' => 33, 'district_id' => 4, 'subdis_id' => '71.71.04.1009', 'name' => 'Istiqlal', 'lat' => '1.4958807754617005', 'lng' => '124.84649219315195'],
            ['id' => 34, 'district_id' => 4, 'subdis_id' => '71.71.04.1010', 'name' => 'Lawangirung', 'lat' => '1.4864992002968511', 'lng' => '124.84574207965949'],
            ['id' => 35, 'district_id' => 4, 'subdis_id' => '71.71.04.1011', 'name' => 'Komo Luar', 'lat' => '1.489401327087029', 'lng' => '124.84901771034649'],
            ['id' => 36, 'district_id' => 4, 'subdis_id' => '71.71.04.1012', 'name' => 'Bumi Beringin', 'lat' => '1.4787133006065096', 'lng' => '124.83846759315168'],
            ['id' => 37, 'district_id' => 5, 'subdis_id' => '71.71.05.1008', 'name' => 'Tikala Baru', 'lat' => '1.4798735299499914', 'lng' => '124.85565426616702'],
            ['id' => 38, 'district_id' => 5, 'subdis_id' => '71.71.05.1009', 'name' => 'Taas', 'lat' => '1.4701885759885454', 'lng' => '124.86348624141776'],
            ['id' => 39, 'district_id' => 5, 'subdis_id' => '71.71.05.1010', 'name' => 'Paal IV', 'lat' => '1.4705859527607346', 'lng' => '124.87435832199014'],
            ['id' => 40, 'district_id' => 5, 'subdis_id' => '71.71.05.1011', 'name' => 'Banjer', 'lat' => '1.4782764280318603', 'lng' => '124.85204248151184'],

            ['id' => 41, 'district_id' => 5, 'subdis_id' => '71.71.05.1012', 'name' => 'Tikala Ares', 'lat' => '1.4828247776406382', 'lng' => '124.84743933203245'],
            ['id' => 42, 'district_id' => 6, 'subdis_id' => '71.71.06.1001', 'name' => 'Sario Utara', 'lat' => '1.472576669129692', 'lng' => '124.83640133624662'],
            ['id' => 43, 'district_id' => 6, 'subdis_id' => '71.71.06.1002', 'name' => 'Sario Kotabaru', 'lat' => '1.4665006421784936', 'lng' => '124.83672070281492'],
            ['id' => 44, 'district_id' => 6, 'subdis_id' => '71.71.06.1003', 'name' => 'Sario Tumpaan', 'lat' => '1.4674475594863532', 'lng' => '124.83250250502378'],
            ['id' => 45, 'district_id' => 6, 'subdis_id' => '71.71.06.1004', 'name' => 'Sario', 'lat' => '1.4656339968534757', 'lng' => '124.83371807327643'],
            ['id' => 46, 'district_id' => 6, 'subdis_id' => '71.71.06.1005', 'name' => 'Titiwungan Utara', 'lat' => '1.479503939029436', 'lng' => '124.83628494177019'],
            ['id' => 47, 'district_id' => 6, 'subdis_id' => '71.71.06.1006', 'name' => 'Titiwungan Selatan', 'lat' => '1.475373041960749', 'lng' => '124.83589171190026'],
            ['id' => 48, 'district_id' => 6, 'subdis_id' => '71.71.06.1007', 'name' => 'Ranotana', 'lat' => '1.4609018601810377', 'lng' => '124.83732998140843'],
            ['id' => 49, 'district_id' => 7, 'subdis_id' => '71.71.07.1001', 'name' => 'Wanea', 'lat' => '1.463267184797367', 'lng' => '124.84544460559381'],
            ['id' => 50, 'district_id' => 7, 'subdis_id' => '71.71.07.1002', 'name' => 'Tanjung Batu', 'lat' => '1.4658028466725375', 'lng' => '124.84514471341043'],

            ['id' => 51, 'district_id' => 7, 'subdis_id' => '71.71.07.1003', 'name' => 'Pakowa', 'lat' => '1.4585377947958214', 'lng' => '124.83989334211641'],
            ['id' => 52, 'district_id' => 7, 'subdis_id' => '71.71.07.1004', 'name' => 'Bumi Nyiur', 'lat' => '1.4612863193233332', 'lng' => '124.84799971087723'],
            ['id' => 53, 'district_id' => 7, 'subdis_id' => '71.71.07.1005', 'name' => 'Ranotana Weru', 'lat' => '1.4524482540749943', 'lng' => '124.84340633671724'],
            ['id' => 54, 'district_id' => 7, 'subdis_id' => '71.71.07.1006', 'name' => 'Teling Atas', 'lat' => '1.472830490535312', 'lng' => '124.84615678554873'],
            ['id' => 55, 'district_id' => 7, 'subdis_id' => '71.71.07.1007', 'name' => 'Tingkulu', 'lat' => '1.4646662508266721', 'lng' => '124.85441847799201'],

            ['id' => 56, 'district_id' => 7, 'subdis_id' => '71.71.07.1008', 'name' => 'Karombasan Utara', 'lat' => '1.4554839196335192', 'lng' => '124.84072992371244'],
            ['id' => 57, 'district_id' => 7, 'subdis_id' => '71.71.07.1009', 'name' => 'Karombasan Selatan', 'lat' => '1.4524846519293604', 'lng' => '124.84144117300026'],
            ['id' => 58, 'district_id' => 8, 'subdis_id' => '71.71.08.1001', 'name' => 'Paniki Bawah', 'lat' => '1.5096866897787384', 'lng' => '124.91131734508274'],
            ['id' => 59, 'district_id' => 8, 'subdis_id' => '71.71.08.1002', 'name' => 'Lapangan', 'lat' => '1.5398227656537473', 'lng' => '124.92095847482109'],
            ['id' => 60, 'district_id' => 8, 'subdis_id' => '71.71.08.1003', 'name' => 'Mapanget Barat', 'lat' => '1.544333656400638', 'lng' => '124.91906719000595'],

            ['id' => 61, 'district_id' => 8, 'subdis_id' => '71.71.08.1004', 'name' => 'Kima Atas','lat' => '1.5578168364114258', 'lng' => '124.90707508100587'],
            ['id' => 62, 'district_id' => 8, 'subdis_id' => '71.71.08.1005', 'name' => 'Buha', 'lat' => '1.520759856931625', 'lng' => '124.87938466223557'],
            ['id' => 63, 'district_id' => 8, 'subdis_id' => '71.71.08.1006', 'name' => 'Bengkol', 'lat' => '1.5364105522221745', 'lng' => '124.87741939314168'],
            ['id' => 64, 'district_id' => 8, 'subdis_id' => '71.71.08.1008', 'name' => 'Kairagi I', 'lat' => '1.4957542446493606', 'lng' => '124.87970914178855'],
            ['id' => 65, 'district_id' => 8, 'subdis_id' => '71.71.08.1009', 'name' => 'Kairagi II', 'lat' => '1.5006209540395177', 'lng' => '124.89288749830148'],

            ['id' => 66, 'district_id' => 8, 'subdis_id' => '71.71.08.1010', 'name' => 'Paniki I', 'lat' => '1.5143962382336964', 'lng' => '124.91416634482287'],
            ['id' => 67, 'district_id' => 8, 'subdis_id' => '71.71.08.1011', 'name' => 'Paniki II', 'lat' => '1.5127505655203355', 'lng' => '124.92002853060148'],
            ['id' => 68, 'district_id' => 9, 'subdis_id' => '71.71.09.1001', 'name' => 'Malalayang I', 'lat' => '1.4548163207714035', 'lng' => '124.81755446865657'],
            ['id' => 69, 'district_id' => 9, 'subdis_id' => '71.71.09.1002', 'name' => 'Bahu', 'lat' => '1.460328226845923', 'lng' => '124.82417966524315'],
            
            ['id' => 70, 'district_id' => 9, 'subdis_id' => '71.71.09.1003', 'name' => 'Kleak', 'lat' => '1.4540544691466608', 'lng' => '124.83101530849486'],
            ['id' => 71, 'district_id' => 9, 'subdis_id' => '71.71.09.1004', 'name' => 'Batu Kota', 'lat' => '1.4469883752708455', 'lng' => '124.82865744506357'],
            ['id' => 72, 'district_id' => 9, 'subdis_id' => '71.71.09.1005', 'name' => 'Malalayang I Timur', 'lat' => '1.458414338176318', 'lng' => '124.81988642785895'],
            ['id' => 73, 'district_id' => 9, 'subdis_id' => '71.71.09.1006', 'name' => 'Malalayang I Barat', 'lat' => '1.4442630357138873', 'lng' => '124.80991296880035'],
            ['id' => 74, 'district_id' => 9, 'subdis_id' => '71.71.09.1007', 'name' => 'Malalayang II', 'lat' => '1.4442630357138873', 'lng' => '124.80991296880035'],
            ['id' => 75, 'district_id' => 9, 'subdis_id' => '71.71.09.1008', 'name' => 'Winangun I', 'lat' => '1.4422439694906486', 'lng' => '124.83997419315322'],
            ['id' => 76, 'district_id' => 9, 'subdis_id' => '71.71.09.1009', 'name' => 'Winangun II', 'lat' => '1.4474351780795456', 'lng' => '124.83516241047097'],
            ['id' => 77, 'district_id' => 10, 'subdis_id' => '71.71.10.1001', 'name' => 'Bunaken', 'lat' => '1.5969121670456', 'lng' => '124.77897798042092'],
            ['id' => 78, 'district_id' => 10, 'subdis_id' => '71.71.10.1002', 'name' => 'Manado Tua I', 'lat' => '1.6462364262098752', 'lng' => '124.70782633593991'],
            ['id' => 79, 'district_id' => 10, 'subdis_id' => '71.71.10.1003', 'name' => 'Manado Tua II', 'lat' => '1.6179818696996198', 'lng' => '124.69378751741387'],
            ['id' => 80, 'district_id' => 10, 'subdis_id' => '71.71.10.1004', 'name' => 'Alung Banua', 'lat' => '1.625499784898711', 'lng' => '124.74474604909132'],

            ['id' => 81, 'district_id' => 4, 'subdis_id' => '71.71.04.1001', 'name' => 'Tikala Kumaraka', 'lat' => '1.4826845252438092', 'lng' => '124.8459463000858'],
            ['id' => 82, 'district_id' => 11, 'subdis_id' => '71.71.11.1001', 'name' => 'Ranomuut', 'lat' => '1.4753629150101415', 'lng' => '124.86864927745773'],
            ['id' => 83, 'district_id' => 11, 'subdis_id' => '71.71.11.1002', 'name' => 'Kairagi Weru', 'lat' => '1.4944555755460291', 'lng' => '124.8763377086174'],
            ['id' => 84, 'district_id' => 11, 'subdis_id' => '71.71.11.1003', 'name' => 'Paal Dua', 'lat' => '1.4904764104250565', 'lng' => '124.8611708616148'],
            ['id' => 85, 'district_id' => 11, 'subdis_id' => '71.71.11.1004', 'name' => 'Perkamil', 'lat' => '1.4729267284654175', 'lng' => '124.87511828163481'],
            ['id' => 86, 'district_id' => 11, 'subdis_id' => '71.71.11.1005', 'name' => 'Malendeng', 'lat' => '1.468914856156496', 'lng' => '124.88270127170297'],
            ['id' => 87, 'district_id' => 11, 'subdis_id' => '71.71.11.1006', 'name' => 'Dendengan Dalam', 'lat' => '1.4837096895885729', 'lng' => '124.85514407112206'],
            ['id' => 88, 'district_id' => 11, 'subdis_id' => '71.71.11.1007', 'name' => 'Dendengan Luar', 'lat' => '1.4868779516318344', 'lng' => '124.85392602396226'],
        ]);
    }
}
