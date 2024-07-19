<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([
            [
                'title' => 'Pengendalian Hama dan Penyakit Tanaman',
                'image' => '20230623072516.jpg',
                'content' => '<p>Pengendalian hama dan penyakit tanaman adalah salah satu aspek penting dalam budidaya tanaman yang berkelanjutan. Hama dan penyakit dapat menyebabkan kerugian besar dalam produksi tanaman jika tidak dikelola dengan baik. Beberapa strategi pengendalian meliputi penggunaan pestisida organik yang ramah lingkungan, penerapan pola tanam bergantian untuk mengurangi penyebaran patogen, serta pemantauan rutin untuk mendeteksi gejala awal serangan hama dan penyakit.</p>
                             <p>Pemilihan varietas tanaman yang tahan terhadap hama dan penyakit juga sangat penting dalam meminimalkan risiko. Selain itu, praktik sanitasi yang baik di area pertanaman seperti pengelolaan sisa tanaman dan pembersihan peralatan pertanian dapat membantu mengurangi populasi patogen.</p>',
                'source' => 'Farmers Weekly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Teknik Bertani Vertikultur',
                'image' => '20230623072516.jpg',
                'content' => '<p>Bertani vertikultur adalah metode inovatif dalam budidaya tanaman di mana tanaman ditanam secara vertikal dalam wadah atau struktur yang dirancang khusus seperti tabung PVC, tower bertingkat, atau dinding vertikal. Metode ini sangat cocok untuk area yang terbatas atau kota-kota besar di mana lahan pertanian terbatas.</p>
                             <p>Keuntungan utama dari bertani vertikultur termasuk efisiensi penggunaan ruang, penghematan air yang signifikan, dan kemampuan untuk mengontrol kondisi pertumbuhan tanaman dengan lebih baik. Selain itu, sistem ini memudahkan pemeliharaan tanaman dan memungkinkan akses yang lebih mudah untuk pemantauan dan pemanenan.</p>',
                'source' => 'Agricultural Research Service',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pemupukan Tanaman Secara Optimal',
                'image' => '20230623072516.jpg',
                'content' => '<p>Pemupukan tanaman merupakan langkah krusial dalam meningkatkan hasil pertanian. Pemilihan jenis dan dosis pupuk yang tepat sangat berpengaruh terhadap pertumbuhan dan kualitas tanaman. Pupuk organik maupun anorganik dapat digunakan, tergantung pada jenis tanah dan kebutuhan nutrisi tanaman.</p>
                             <p>Untuk mencapai pemupukan yang optimal, penting untuk melakukan analisis tanah secara teratur dan mengikuti rekomendasi dosis pupuk berdasarkan jenis tanaman yang dibudidayakan. Selain itu, pemberian pupuk sebaiknya disesuaikan dengan fase pertumbuhan tanaman untuk mendukung perkembangan vegetatif maupun reproduksi dengan maksimal.</p>',
                'source' => 'AgriTech Magazine',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Penggunaan Teknologi IoT dalam Pertanian',
                'image' => '20230624102758.jpeg',
                'content' => '<p>Penggunaan Internet of Things (IoT) telah membawa revolusi besar dalam industri pertanian modern. Teknologi ini memungkinkan pertanian presisi dengan memanfaatkan sensor dan perangkat pintar untuk memantau kondisi tanaman, suhu udara, kelembaban tanah, dan banyak parameter pertanian lainnya secara real-time.</p>
                             <p>Dengan data yang dikumpulkan secara akurat, petani dapat membuat keputusan yang lebih baik dalam pengelolaan lahan dan sumber daya, seperti irigasi yang efisien dan penggunaan pupuk yang tepat. Selain itu, aplikasi IoT juga dapat digunakan untuk mengotomatisasi proses pertanian seperti irigasi otomatis berdasarkan kebutuhan tanaman.</p>',
                'source' => 'Precision Farming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Praktik Budidaya Tanaman Organik',
                'image' => '20230623072516.jpg',
                'content' => '<p>Budidaya tanaman organik semakin populer sebagai respons terhadap permintaan konsumen akan produk pangan yang lebih sehat dan ramah lingkungan. Budidaya organik menekankan penggunaan bahan-bahan alami seperti kompos dan pupuk hijau untuk memperbaiki struktur tanah dan kesehatan tanaman.</p>
                             <p>Praktik berkelanjutan seperti rotasi tanaman, pengendalian gulma secara mekanik, dan penggunaan predator alami untuk pengendalian hama, merupakan bagian integral dari budidaya tanaman organik. Hasilnya adalah produk pertanian yang lebih berkualitas dengan tingkat residu pestisida yang rendah, serta dampak lingkungan yang lebih baik.</p>',
                'source' => 'Organic Farming Association',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
