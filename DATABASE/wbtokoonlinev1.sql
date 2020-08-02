-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 10:52 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbtokoonlinev1`
--

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`gambar`) VALUES
('img_background/bg_page.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Ya',
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `username`, `url`, `aktif`, `gambar`, `tgl_posting`) VALUES
(1, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'banner_arla.jpg', '2013-04-10'),
(2, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'banner001.jpg', '2013-04-10'),
(3, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'banner002.jpg', '2013-04-10'),
(4, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'banner003.jpg', '2013-04-10'),
(5, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'banner004.jpg', '2013-04-10'),
(6, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'banner005.jpg', '2013-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(5) NOT NULL,
  `id_kategoriblog` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_blog` text COLLATE latin1_general_ci NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_kategoriblog`, `username`, `judul`, `sub_judul`, `judul_seo`, `headline`, `isi_blog`, `keterangan_gambar`, `youtube`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(28, 4, 'admin', 'Kejutan Koleksi Elegan', 'Trend Fashion', 'kejutan-koleksi-elegan', 'Y', '<p><strong>KreasiBoutique, </strong>Koleksi Hermes terbaru di Paris Fashion Week kental dengan kesan simpel, segar, dan mewah. Di tangan desainer barunya, Christophe Lemaire, koleksi Hermes mampu memukau ratusan tamu undangan yang hadir.<br /><br />Saat pergelaran, Lemaire mencetuskan ide dengan menyembunyikan para model dalam bilik-bilik ruangan yang hanya diterangi cahaya lampu redup. Setelah itu, model keluar dan berjalan mengitari kursi penonton, kemudian secara acak berhenti di hadapan mereka sembari berpose anggun, lalu kembali berlenggak lenggok di atas panggung.<br /><br />&ldquo;Saya ingin menciptakan sesuatu yang baru dan segar, menampilkan wajah Hermes yang lebih segar dan penuh kejutan,&rdquo; ucap Lemaire seperti dilansir WWD.<br /><br />Ide pergelaran itu terinspirasi dari pelancong yang mengembara ke tempat-tempat berbeda sambil mendengarkan alunan musik, lalu ada seorang wanita yang datang tiba-tiba, memesona dan cantik.<br /><br />Ibarat penonton, pemandangan seperti itulah yang tertangkap dalam imajinasi. Apa hanya pergelaran yang berbeda? Ternyata tidak.<br /><br />Kejutan juga datang dari koleksi busana, tas, serta aksesori yang dirancang Lemaire. Koleksi busana Hermes lebih bermain pada warna-warna putih, pastel, dan kombinasi warna terang seperti merah, oranye, kuning, dan hijau.<br /><br />Pergelaran dibuka dengan koleksi atasan berwarna putih yang dikombinasi dengan model celana harem dan jaket balon berukuran besar. Selanjutnya ditampilkan pula koleksi gaun tunik dan celana kulit berpotongan lebar dengan tiga strip garis di bagian betis. Ada juga rok dengan detail cutting dan siluet menyamping, serta atasan dari bahan kulit.<br /><br />Adapun yang menjadi inspirasi dari koleksi tersebut adalah gaun futuristik Yunani di era 1980-an ketika warna putih menjadi warna dominan yang berpadu dengan bahan kulit serta garis lipitan yang tegas memanjang. Sekilas, gaun tersebut terkesan klasik dan monoton. Tapi, perhatian penonton tak hentinya tertuju pada model-model yang berseliweran di depan dan sekeliling mereka.<br /><br />Hanya ada beberapa gaun yang direpresentasikan dengan ekspresi ceria oleh sang model. Oh ya, satu lagi yang menarik, kebanyakan dari mereka mengenakan ikat kepala dari bahan kulit tepat di batas garis poni lurus yang tertata rapi. Lemaire tidak hanya menunjukkan warna putih pada rancangannya.<br /><br />Dia kembali hadir membawa nuansa warna pelangi. Salah satunya koleksi two pieces yang penuh kombinasi dua warna, yakni merah dan biru berupa baju atasan dan rok mini berpadu dengan stocking warna senada.<br /><br />Selanjutnya, model memamerkan rok mini lipit, kemeja polos, dan jaket berkulit lembut yang bahannya diambil dari bulu domba.<br /><br />Diikuti oleh model yang mengenakan gaun pendek berwarna oranye berbahan linen dengan variasi sabuk kulit.Gaun ini cukup menarik perhatian karena menampilkan kesan yang unik. Pergelaran berlanjut pada model yang membawa koleksi setelan baju warna hijau berpadu dengan celana pendek warna karamel diikuti gaun cetak bergaya Amerika Indian yang memiliki kantung celana di bagian sisi kanan dan kiri pinggul.<br /><br />Kemudian,ada dua model yang bergantian tampil, salah satunya mengenakan suede shirt warna hijau dengan lengan tiga perempat dipadu rok berbahan kulit warna ungu terong. Sebagian besar koleksi Hermes tersebut coba memadukan antara gaya Yunani klasik dan gaya modern Amerika yang dibalut dengan permainan warnawarni yang selaras.<br /><br />Lemaire mengemas pergelaran Hermes dengan sentuhan yang &ldquo;berjiwa&rdquo; dan filosofi yang kuat. Tidak jauh berbeda dengan identitas Hermes sebelumnya, koleksi Spring/Summer 2012ini menampilkan kreasi yang lebih dinamis dan tentu saja elegan.</p>', '    gambar: istimewa', '', 'Kamis', '2013-04-11', '00:41:25', '31blog3.jpg', 89, 'fashion'),
(29, 4, 'admin', 'Perkembagan Busana Muslim', '', 'perkembagan-busana-muslim', 'Y', '<p><strong>KreasiBoutique, </strong>Pakaian busana muslim adalah seni yang datang dan menyebar sangat cepat karena kebanyakan orang suka memakai kain tersebut. Sekarang muslim semakin banyak perempuan dan anak perempuan yang datang dan membuat karir mereka di industri fashion. Seseorang harus menghargai upaya para perempuan Muslim dan anak perempuan yang meskipun begitu banyak rintangan yang datang dan membantu dengan cara yang indah banyak Muslim untuk tersebar di seluruh dunia.<br /> <br /> Banyak orang di dunia pada awalnya tidak menyadari begitu banyak desain yang indah dan kemampuan wanita-wanita. Namun hari-hari telah pergi dan sekarang busana muslim datang dengan ide-ide baru dan bekerja kreativitas karena kerja keras mereka dan sekarang orang-orang datang untuk mengetahui pikiran kreativitas para perempuan diremehkan dan gadis.<br /> <br /> Beberapa perancang mode terkenal mengambil pakaian busana muslim yang sangat serius dan mereka bekerja banyak dalam pengembangan busana muslim merancang. Banyak desainer terkenal dirancang muslim kain mode sekarang mudah tersedia di toko-toko online. Satu bisa membelinya dengan sangat mudah secara online atau di outlet mana mereka tersedia dengan diskon besar.<br /> <br /> <strong>Tantangan</strong><br /> <br /> Sebagai perempuan Muslim dan anak perempuan tidak banyak modis dibandingkan dengan wanita dari agama lain, tetapi perempuan Muslim dan anak perempuan yang keluar dari burkha dan beradaptasi dengan era mode saat ini sangat cepat. Sebagai perempuan Muslim dan perempuan yang sebelumnya tidak diizinkan untuk melakukan mode tapi sekarang hari muslim perempuan dan gadis datang dengan ide-ide sendiri mode dan menghasilkan tantangan baik terhadap perancang busana lain tetapi mereka masih menghadapi tantangan hal untuk perancang busana sesama mereka . perempuan Muslim dan perubahan pakaian laki-laki dari satu tempat ke tempat, di negara-negara modern yang bisa melihat wanita tidak mengenakan burkha tapi tidak bisa melihat mereka dalam gaun pendek baik. Dan di negara-negara Muslim khas seseorang dapat wanita menutupi wajah di atas burkha dan mengenakan gaun hitam.<br /> <br /> <strong>Keuntungan</strong><br /> <br /> pakaian muslim pada dasarnya sangat terkenal, warna desain dan bordir. Sejak berabad-abad busana muslim terkenal untuk pakaian, tetapi karena beberapa masalah sosial yang mereka tidak datang di seluruh dunia tapi sekarang situasi berubah karir sangat cepat dan sebagian besar wanita dan anak perempuan sekarang membuat dengan cara merancang yang masih seperti mimpi beberapa dekade kembali. Mode busana Muslim berkembang sangat cepat dalam hal kualitas dan gaya. pakaian muslim sekarang tersedia hampir di semua setiap warna dan gaya dengan polyester tradisional yang terbuat gaun. Busana muslim sekarang tersedia hampir di setiap warna dan dengan mode saat ini.<br /> <br /> Beberapa perancang mode terkenal mengambil pakaian busana muslim yang sangat serius dan mereka bekerja banyak dalam pengembangan busana muslim merancang. Banyak desainer terkenal dirancang muslim kain mode sekarang mudah tersedia di toko-toko online. Satu dapat membelinya sangat mudah online di diskon besar dan dapat menghemat waktu dan uang. Ada berbagai desain pakaian tersedia dari minimum untuk maksimal mencakup dalam busana busana muslim.</p>', '    ', '', 'Kamis', '2013-04-11', '02:34:16', '5busana_muslim1.jpeg', 15, 'fashion'),
(30, 4, 'admin', 'Asal-Usul T-Shirt ', '', 'asalusul-tshirt-', 'Y', '<p><strong>KreasiBoutique, </strong>T-Shirt atau Kaos oblong mungkin sudah menjadi pakaian yang biasa kita pakai sehari-hari dalam beraktifitas, bukan hanya untuk kegiatan santai, tapi apabila dipadu padankan dengan pakain yang lain kaos bisa dipakai pada acara resmi juga. Banyak alasan kenapa kita suka memakai kaos oblong; simpel, adem, gaul, dll&hellip;tapi ada yang tahu nggak sejarah awal mula adanya kaos oblong?<br /><br />T- Shirt atau kaos oblong pada awalnya digunakan sebagai pakaian dalam tentara Inggris dan Amerika pada abad 19 sampai awal abad 20. Asal muasal nama inggrisnya, T-shirt, tidak diketahui secara pasti. Teori yang paling umum diterima adalah nama T-shirt berasal dari bentuknya yang menyerupai huruf &ldquo;T&rdquo;, atau di karenakan pasukan militer sering menggunakan pakaian jenis ini sebagai &ldquo;training shirt&ldquo;<br /><br />T-shirt alias kaos polos ini mulai dipopulerkan sewaktu dipakai oleh Marlon Brando pada tahun 1947, yaitu ketika ia memerankan tokoh Stanley Kowalsky dalam pentas teater dengan lakon &ldquo;A Street Named Desire&rdquo; karya Tenesse William di Broadway, AS. T-shirt berwarna abu-abu yang dikenakannya begitu pas dan lekat di tubuh Brando, serta sesuai dengan karakter tokoh yang diperankannya. dan film Rebel Without A Cause (1995) yang dibintangi James Dean.<br /><br />Demam kaos oblong yang melumat seluruh benua Amerika dan Eropa pun terjadi sekita tahun 1961 itu. Apalagi ketika aktor James Dean mengenakan kaos oblong dalam film &ldquo;Rebel Without A Cause&rdquo;, sehingga eksistensi kaos oblong semakin kukuh dalam kehidupan di sana.<br /><br />Pada pertengahan tahun 50an, T-shirt sudah mulai menjadi bagian bagian dari dunia fashion. Namun baru pada tahun 60an ketika kaum hippies mulai merajai dunia, T-shirt benar-benar menjadi state of fashion itu sendiri. Sebagai sebuah simbol (lagi-lagi) anti kemapanan, para hippies ini menggunakan T-shirt/kaos sebagai salah satu simbolnya.<br /><br />Di Indonesia sendiri, konon, masuknya benda ini karena dibawa oleh orang-orang Belanda. Namun ketika itu perkembangannya tidak pesat, sebab benda ini mempunyai nilai gengsi tingkat tinggi, dan di Indonesia teknologi pemintalannya belum maju. Akibatnya benda ini termasuk barang mahal.<br /><br />Namun demikian, kaos oblong baru menampakkan perkembangan yang signifikan hingga merambah ke segenap pelosok pedesaan sekitar awal tahun 1970. Ketika itu wujudnya masih konvensional. Berwana putih, bahan katun-halus-tipis, melekat ketat di badan dan hanya untuk kaum pria. Beberapa merek yang terkenal waktu itu adalah Swan dan 77. Ada juga merek Cabe Rawit, Kembang Manggis, dan lain-lain. Dan tren kaos oblong rupa-rupanya direkam pula oleh Kartunis GM Sudarta melalui tokoh Om Pasikom dan kemenakannya dengan tajuk &ldquo;Generasi Kaos Oblong&rdquo;</p>', '              ', '', 'Kamis', '2013-04-11', '03:04:48', '17asal_usul_tshirt.jpeg', 25, 'fashion'),
(31, 2, 'admin', 'Gaya Casual ke Kantor Akhir Pekan', '', 'gaya-casual-ke-kantor-akhir-pekan', 'Y', '<p><strong>KreasiBoutique,</strong> Hari Jumat merupakan hari di mana Anda bisa tampil lebih kasual ke kantor, tapi hati-hati jangan sampai gaya Anda malah terlihat tidak rapi. Berikut ini adalah beberapa tips untuk bergaya smart casual ke kantor, untuk pria dan wanita.<br /><br />Jeans. Sebaiknya pilih warna jeans yang gelap, hindari celana jeans dengan warna belel atau faded, robek-robek atau ripped jeans, dan model baggy. Model celana jeans paling aman ada skinny, slim, dan boot cut.<br /><br />Blazer. Untuk gaya smart casual Anda boleh bereksperimen dengan blazer berwarna terang atau bermotif. Bagi wanita, jika ingin terkesan elegan, pilih blazer pas badan.<br /><br />T-shirt. Sebaiknya pilih t-shirt berwarna polos dengan detail simpel, seperti kantong di dada atau bagian lengan tergulung. Hindari t-shirt bergambar atau ramai dengan tulisan.<br /><br />Sepatu. Para pria, sebaiknya hindari sepatu olahraga, kecuali jika Anda bekerja di media massa dan memang memerlukan sepatu nyaman untuk bergerak. Pilih sepatu hak datar yang tak kalah nyamannya, seperti loafers dan loafers. Sedangkan untuk wanita, ankle boots, wedges dengan model tertutup, dan flat shoes masih cukup aman untuk dipakai ke kantor.</p>', '', '', 'Jumat', '2013-04-12', '01:24:16', '67casual.jpeg', 12, 'tips--trik'),
(32, 2, 'admin', 'Tips Berbusana Muslim', '', 'tips-berbusana-muslim', 'Y', '<p><strong>KreasiBoutique,</strong> Dalam Berbusana muslim hal yang terpenting adalah menutup aurat, baju muslim modern saat ini adalah hasil perpaduan dari kreatifitas anda sendiri dalam berbusana muslim anda bisa mengkombinasikan dengan busana keseharian anda yang tentunya harus menutup aurat dan tidak menampakkan siluet bentuk tubuh yang dapat mengundang syahwat.<br /><br /><strong>Beberapa tips busana muslim:</strong><br /><br />Tips busana muslim Pertama : Sesuai fiqh. busana muslim bertujuan untuk melindungi tubuh pemakainya dari hal-hal yang bisa mencederainya, selain untuk menutupi aurat. Itu sebabnya pilih busana muslim yang longgar sehingga menyamarkan siluet tubuh.<br /><br />Tips busana muslim Kedua : Usahakan pilih busana muslim yang pas ukurannya agar tidak membahayakan saat melangkah. Busana yang kekecilan selain mengganggu gerak juga membuat kulit sulit untuk bernapas, selain tak sesuai kaidah berbusana menurut Islam.Sementara busana yang terlalu besar ukurannya juga membahayakan karena bisa terinjak saat berjalan dan mengakibatkan pemakainya jatuh. Bisa juga terkait benda-benda yang lebih tajam sehingga merusak bahan dan mencelakai pemakainya.<br /><br />Tips busana muslim Ketiga : Pilih model dan warna yang sesuai aktivitas. Jika pengguna banyak beraktivitas, sebaiknya gunakan bahan menyerap keringat yang tak mudah kusut. Sebaiknya terdiri dari dua potong, atasan dan celana panjang. Untuk aktivitas yang lebih banyak diam di tempat, pengguna bisa menggunakan rok.<br /><br />Selain memiliki koleksi warna-warna ceria, seperti pink, biru muda, oranye, dan merah, untuk berbagai acara yang bersifat tidak formal, sebaiknya miliki juga busana muslim berwarna netral dan formal, seperti biru tua, abu-abu, hitam, dan putih. Untuk mendapatkannya Anda bisa pergi ke butik busana muslim seperti ke Muslim Modis. Di butik baju muslim banyak tersedia berbagai macam pilihan.<br /><br />Tips busana muslim Keempat : Dalam menggunakan busana muslim adalah saat berbelanja baju muslimah baru, usahakan untuk menyerasikan baju baru dengan model dan warna baju yang sudah dimiliki. Ini bermanfaat untuk berkreasi memadupadankan pakaian sehingga tetap bisa dipakai.<br /><br />Tips busana muslim Kelima : Biasakan memilih model penutup kepala yang tetap menutupi leher. Pelajari berbagai kreasi kerudung yang banyak diinformasikan media massa sehingga penggunanya bisa tetap mengikuti mode, namun tetap mengikuti aturan agama. Pilihlah butik busana muslim yang terbaik buat Anda.<br /><br />Tips busana muslim Keenam : Pilih pakaian yang bisa menyamarkan kekurangan tubuh agar nyaman bersosialisasi. Misalnya, orang yang berbadan lurus sebaiknya menggunakan pakaian yang terkesan bertumpuk. Orang berbobot berat sebaiknya menyamarkan bagian berat tersebut dengan memilih bahan-bahan yang terkesan ringan. Butik baju muslim akan membantu Anda mendapatkanmodel keinginan.<br /><br />Pemilihan warna juga bisa dilakukan untuk menutupi kekurangan. Misalnya, warna gelap cocok digunakan untuk orang yang berbadan besar.<br /><br />Tips busana muslim ketujuh : Jika ingin menghadiri sebuah acara pesta, sebaiknya tak perlu bingung memilih pakaian.<br /><br />Pakaian sederhana yang dimiliki bisa terkesan mewah dengan cara memberikan pelengkap dari bahan yang terkesan mewah. Misalnya, menggabungkan batik berbahan katun dengan selendang berbahan organdi yang serasi, atau membalut gamis sederhana dengan obi dari sutra atau berbordir.<br /><br />Busana muslim selain memenuhi syarat syar,i juga harus memberikan kenyamanan dan keamanan. memilih kebutuhan busana muslim untuk wisata misalnya harus sesuai.</p>', '', '', 'Jumat', '2013-04-12', '05:50:52', '39TipsMemilihBusanaMuslim.jpg', 11, 'tips--trik'),
(33, 2, 'admin', 'Tips Fesyen untuk Remaja', '', 'tips-fesyen-untuk-remaja', 'N', '<p><strong>KreasiBoutique,</strong> Saat ini, fashion untuk remaja perempuan telah menjadi bagian yang sangat penting dari kehidupan mereka. Apakah mereka membutuhkan gaun baru atau tidak, mereka pasti akan tergoda untuk membeli gaun baru yang dirancang dan ditampilkan di pusat perbelanjaan setempat.<br /><br />Memang benar bahwa fashion membantu meningkatkan keindahan dan kepribadian seseorang secara keseluruhan, tetapi ada hal-hal tertentu yang perlu Anda perhatikan ketika memutuskan fashion apa yang akan dikenakan.<br /><br />Ada aturan dasar tertentu yang harus diikuti sehingga Anda dapat meningkatkan kecantikan fisik Anda dan tidak merusaknya.<br /><br />Berikut adalah beberapa tips fashion yang menarik dan indah bagi para gadis-gadis dan dijamin tidak akan salah.<br /><br />1. Salah satu aturan pertama dari fashion adalah bahwa Anda harus berdandan sesuai dengan jenis tubuh yang Anda miliki. Jangan membabi buta meniru fashion karena Anda pasti tidak ingin melakukan apa yang disebut sebagai &ldquo;bencana fashion&rdquo;. Bahkan wanita yang paling cantik di dunia mungkin memiliki kelemahan tertentu dan para perempuan ini cukup pintar untuk menyembunyikan kekurangannya ini dengan pakaian yang tepat. Ketika membeli gaun baru, selalu ingat kekurangan dari tubuh Anda dan jenis tubuh Anda. Gaun yang Anda pilih tidak hanya menyembunyikan kekurangan Anda, tapi pada saat yang sama, pakaian tersebut harus mendorong keluarnya fitur yang menarik dari dalam diri Anda.<br /><br />2. Gadis-gadis yang memiliki bahu lebar atau dada yang besar harus memakai pakaian yang tidak akan menarik perhatian ke daerah-daerah bagian tubuh tersebut. Bagi gadis-gadis yang memiliki berat bagian atas harus mencoba mengenakan atasan dan blus dengan garis horisontal, potongan leher &lsquo;V&rsquo; dan kerah kecil. Di sisi lain, gadis-gadis dengan berat di bagian bawah harus menghindari mengenakan gaun ketat. Celana longgar dengan pinggang rendah akan cocok. Rok longgar yang memiliki pola lurus juga akan sesuai.<br /><br />3. Salah satu tips fashion lainnya yang penting bagi anak perempuan adalah pilihan bra. Bra merupakan pakaian dalam yang penting dan Anda harus mengusahakan agar talinya tidak terlihat orang. Jika Anda memilih untuk mengenakan atasan spaghetti, pastikan Anda memakai bra tanpa tali karena memperlihatkan tali bra Anda adalah merupakan bagian dari penampilan Anda tidak modis sama sekali.<br /><br /><strong>Tips fashion cepat lainnya untuk anak perempuan:</strong><br /><br />Make-up cukup populer karena make-up membantu meningkatkan kecantikan fisik secara keseluruhan. Ketika memakai make up, usahakan tetap sealami mungkin. Hindari menggunakan warna-warna seperti ungu, biru dan hijau.<br /><br /></p>\r\n<ul>\r\n<li>Tambahkan hair glitter atau glitter body gel sehingga akan menambah sentuhan yang lucu dan menarik</li>\r\n<li>Gunakan aksesoris rambut yang kecil dan berkilau</li>\r\n<li>Tops dan blus dengan sedikit embel-embel akan cocok dan sesuai.</li>\r\n</ul>\r\n<p><br />Pastikan diri Anda selalu tidak ketinggalan dengan trend fashion terbaru. Kunjungi website kami dan silakan cari tahu informasi lebih lanjut tentang tips fashion untuk gadis-gadis.</p>', 'Trend gaya remaja Asia.', '', 'Jumat', '2013-04-12', '06:13:33', '7fsyen_remaja.jpeg', 105, 'tips--trik');

-- --------------------------------------------------------

--
-- Table structure for table `carabeli`
--

CREATE TABLE `carabeli` (
  `id_carabeli` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_carabeli` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `carabeli`
--

INSERT INTO `carabeli` (`id_carabeli`, `username`, `judul`, `judul_seo`, `isi_carabeli`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`) VALUES
(5, 'admin', 'Cara Pembelian', 'cara-pembelian', '<ol>\r\n<li>Klik pada tombol&nbsp;<span style=\"font-weight: bold;\">Beli</span> pada produk yang ingin Anda pesan.</li>\r\n<li>Produk yang Anda pesan akan masuk ke dalam <span style=\"font-weight: bold;\">Keranjang Belanja</span>. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom <span style=\"font-weight: bold;\">Jumlah</span>, kemudian klik tombol <span style=\"font-weight: bold;\">Update</span>. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.</li>\r\n<li>Jika sudah selesai, klik tombol <span style=\"font-weight: bold;\">Selesai Belanja</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>\r\n<li>Setelah data pembeli selesai diisikan, klik tombol <span style=\"font-weight: bold;\">Proses</span>, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta nomor rekening pembayaran.</li>\r\n<li>Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan.</li>\r\n</ol>\r\n<p>&nbsp;</p>', 'Rabu', '2013-04-03', '09:40:00', '12carabeli_pic.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter_ips`
--

CREATE TABLE `counter_ips` (
  `ip` varchar(15) NOT NULL,
  `visit` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_ips`
--

INSERT INTO `counter_ips` (`ip`, `visit`) VALUES
('127.0.0.1', '2013-04-05 00:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `counter_values`
--

CREATE TABLE `counter_values` (
  `id` bigint(11) NOT NULL,
  `day_id` bigint(11) NOT NULL,
  `day_value` bigint(11) NOT NULL,
  `week_id` bigint(11) NOT NULL,
  `week_value` bigint(11) NOT NULL,
  `month_id` bigint(11) NOT NULL,
  `month_value` bigint(11) NOT NULL,
  `year_id` bigint(11) NOT NULL,
  `year_value` bigint(11) NOT NULL,
  `all_value` bigint(11) NOT NULL,
  `record_date` datetime NOT NULL,
  `record_value` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_values`
--

INSERT INTO `counter_values` (`id`, `day_id`, `day_value`, `week_id`, `week_value`, `month_id`, `month_value`, `year_id`, `year_value`, `all_value`, `record_date`, `record_value`) VALUES
(1, 93, 1, 14, 1, 4, 1, 2013, 12, 297, '2012-11-30 22:02:57', 14);

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `username`, `nama_file`, `tgl_posting`, `hits`) VALUES
(28, 'Contoh Katalog April 2013', 'admin', 'contoh_katalog.jpg', '2013-04-12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `produk_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_produk`, `username`, `nama_produk`, `produk_seo`, `gbr_gallery`) VALUES
(1, 213, 'admin', '', '', '45phantasia-001.jpg'),
(2, 213, 'admin', '', '', '54phantasia-002.jpg'),
(3, 213, 'admin', '', '', '24phantasia-003.jpg'),
(4, 213, 'admin', '', '', '34phantasia-004.jpg'),
(5, 212, 'admin', '', '', '92tolliver002.jpg'),
(6, 212, 'admin', '', '', '53tolliver003.jpg'),
(7, 212, 'admin', '', '', '7tolliver004.jpg'),
(8, 212, 'admin', '', '', '77tolliver001.jpg'),
(9, 211, 'admin', '', '', '92quinna-molla1.jpg'),
(10, 211, 'admin', '', '', '53quinna-molla2.jpg'),
(11, 211, 'admin', '', '', '55quinna-molla3.jpg'),
(12, 211, 'admin', '', '', '15quinna-molla4.jpg'),
(13, 210, 'admin', '', '', '72symbolize-1.jpg'),
(14, 210, 'admin', '', '', '64symbolize-2.jpg'),
(15, 210, 'admin', '', '', '25symbolize-3.jpg'),
(16, 210, 'admin', '', '', '6symbolize-4.jpg'),
(17, 209, 'admin', '', '', '89noche-1.jpg'),
(18, 209, 'admin', '', '', '37noche-2.jpg'),
(19, 209, 'admin', '', '', '13noche-3.jpg'),
(20, 209, 'admin', '', '', '4noche-4.jpg'),
(21, 214, 'admin', '', '', '27tolliver-1.jpg'),
(22, 214, 'admin', '', '', '70tolliver-2.jpg'),
(23, 214, 'admin', '', '', '34tolliver-3.jpg'),
(24, 214, 'admin', '', '', '43tolliver-4.jpg'),
(25, 195, 'admin', '', '', '79hellolulu-1.jpg'),
(26, 195, 'admin', '', '', '78hellolulu-2.jpg'),
(27, 195, 'admin', '', '', '92hellolulu-3.jpg'),
(28, 195, 'admin', '', '', '5hellolulu-4.jpg'),
(29, 194, 'admin', '', '', '2mipac-1.jpg'),
(30, 194, 'admin', '', '', '88mipac-2.jpg'),
(31, 194, 'admin', '', '', '54mipac-3.jpg'),
(32, 194, 'admin', '', '', '48mipac-4.jpg'),
(33, 193, 'admin', '', '', '45nautilus-1.jpg'),
(34, 193, 'admin', '', '', '41nautilus-2.jpg'),
(35, 193, 'admin', '', '', '75nautilus-3.jpg'),
(36, 193, 'admin', '', '', '45nautilus-4.jpg'),
(37, 192, 'admin', '', '', '97phantasia-1.jpg'),
(38, 192, 'admin', '', '', '16phantasia-2.jpg'),
(39, 192, 'admin', '', '', '54phantasia-3.jpg'),
(40, 192, 'admin', '', '', '21phantasia-4.jpg'),
(41, 191, 'admin', '', '', '73tolliver-1.jpg'),
(42, 191, 'admin', '', '', '29tolliver-2.jpg'),
(43, 191, 'admin', '', '', '15tolliver-3.jpg'),
(44, 191, 'admin', '', '', '86tolliver-4.jpg'),
(45, 189, 'admin', '', '', '27mipac-1.jpg'),
(46, 189, 'admin', '', '', '49mipac-2.jpg'),
(47, 189, 'admin', '', '', '70mipac-3.jpg'),
(48, 189, 'admin', '', '', '12mipac-4.jpg'),
(49, 202, 'admin', '', '', '55sessa-1.jpg'),
(50, 202, 'admin', '', '', '21sessa-2.jpg'),
(51, 202, 'admin', '', '', '34sessa-3.jpg'),
(52, 202, 'admin', '', '', '85sessa-4.jpg'),
(53, 201, 'admin', '', '', '76triset-ladies-1.jpg'),
(54, 201, 'admin', '', '', '78triset-ladies-2.jpg'),
(55, 201, 'admin', '', '', '65triset-ladies-3.jpg'),
(56, 201, 'admin', '', '', '99triset-ladies-4.jpg'),
(57, 199, 'admin', '', '', '94lois-jeans-1.jpg'),
(58, 199, 'admin', '', '', '90lois-jeans-3.jpg'),
(59, 199, 'admin', '', '', '48lois-jeans-2.jpg'),
(60, 199, 'admin', '', '', '62lois-jeans-4.jpg'),
(61, 215, 'admin', '', '', '76bellabaric-2.jpg'),
(62, 215, 'admin', '', '', '91bellabaric-3.jpg'),
(63, 215, 'admin', '', '', '57bellabaric-4.jpg'),
(64, 215, 'admin', '', '', '16bellabaric1.jpg'),
(65, 185, 'admin', '', '', '99leaf-1.jpg'),
(66, 185, 'admin', '', '', '91leaf-2.jpg'),
(67, 185, 'admin', '', '', '82leaf-3.jpg'),
(68, 185, 'admin', '', '', '62leaf-4.jpg'),
(69, 184, 'admin', '', '', '33nikoo-1.jpg'),
(70, 184, 'admin', '', '', '92nikoo-2.jpg'),
(71, 184, 'admin', '', '', '26nikoo-3.jpg'),
(72, 184, 'admin', '', '', '28nikoo-4.jpg'),
(73, 200, 'admin', '', '', '17fila-1.jpg'),
(74, 200, 'admin', '', '', '85fila-2.jpg'),
(75, 200, 'admin', '', '', '31fila-3.jpg'),
(76, 200, 'admin', '', '', '25fila-4.jpg'),
(77, 198, 'admin', '', '', '15adidas-1.jpg'),
(78, 198, 'admin', '', '', '71adidas-2.jpg'),
(79, 198, 'admin', '', '', '21adidas-3.jpg'),
(80, 198, 'admin', '', '', '74adidas-4.jpg'),
(81, 197, 'admin', '', '', '72salt-n-pepper1.jpg'),
(82, 197, 'admin', '', '', '28salt-n-pepper2.jpg'),
(83, 197, 'admin', '', '', '6salt-n-pepper3.jpg'),
(84, 197, 'admin', '', '', '15salt-n-pepper-4.jpg'),
(85, 196, 'admin', '', '', '55shirtbank-1.jpg'),
(86, 196, 'admin', '', '', '59shirtbank-2.jpg'),
(87, 196, 'admin', '', '', '50shirtbank-3.jpg'),
(88, 196, 'admin', '', '', '53shirtbank-4.jpg'),
(89, 188, 'admin', '', '', '6atypical-man1.jpg'),
(90, 188, 'admin', '', '', '66atypical-man4.jpg'),
(91, 188, 'admin', '', '', '89atypical-man2.jpg'),
(92, 188, 'admin', '', '', '61atypical-man3.jpg'),
(93, 186, 'admin', '', '', '14sixpax-1.jpg'),
(94, 186, 'admin', '', '', '28sixpax-2.jpg'),
(95, 186, 'admin', '', '', '70sixpax-3.jpg'),
(96, 186, 'admin', '', '', '33sixpax-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(18, 'Jasa Pembuatan Website', 'jasa-pembuatan-website', '<p>Ingin mempunyai website seperti KreasiBoutique ini? Bingung membuat website? Kami menawarkan jasa pembuatan website berkualitas dengan fitur professional. Kami melayani pembuatan website untuk keperluan website pribadi (personal website), perusahaan (company profile), website sekolah (web school), photography (web gallery), toko online (e-commerce) serta website untuk keperluan khusus bagi perusahan, organisasi, lembaga pemerintah, personal, komunitas, organisasi, UKM atau lainnya.<br /> <br /> <strong>Kelebihan Kami</strong><br /> Kelebihan kami adalah kemampuan untuk menawarkan kepada anda layanan penuh. Mulai dari desain web, script, keamanan sistem, garansi kerusakan, sesuai standar dan tren web terkini. Selain itu kami juga telah menggunakan CMS (Content Management System) sehingga memudahkan anda untuk mengelola website semudah mengelola file dokumen Microsoft Word. Cukup dengan keahlian mengetik di Microsoft Word anda sudah dapat menjadi webmaster yang powerfull dan profesional.</p>\r\n<p>Berbekal pengalaman dalam jasa pembuatan website ke berbagai perusahaan dan lainnya, kami siap membantu untuk menghadirkan website anda di internet melalui beberapa produk desain website kami. Segera hubungi kami dan dapatkan website idaman anda! <br /> <br /> <strong>Berikut beberapa demo/contoh website produk kami:&nbsp;</strong></p>\r\n<ul>\r\n<li><a href=\"http://luxindotours.com\">Luxindo Tours</a></li>\r\n<li><a href=\"http://iwapi-pusat.org\">Iwapi Pusat</a></li>\r\n<li><a href=\"http://kuejajananpasar.com\">Kue Jajanan Pasar</a></li>\r\n<li><a href=\"http://kenrizresto.co.cc\">KenrizResto</a></li>\r\n<li><a href=\"http://resoar.co.cc\">Reka Solusi Arthamedia</a></li>\r\n<li><a href=\"http://eksotika-photography.co.c\">Eksotika Photography</a></li>\r\n<li><a href=\"http://griyagaya.co.cc\">Griyagaya</a></li>\r\n<li><a href=\"http://rizalonline.morganhosting.co.cc/anekajam\">Aneka Jam</a></li>\r\n<li><a href=\"http://rizalonline.morganhosting.co.cc/artfurniture\">Art Furniture</a></li>\r\n<li><a href=\"http://rizalonline.morganhosting.co.cc/selarasinterior\">Selaras Interior</a></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bila anda berminat silahkan lakukan pemesanan sekarang dengan meng-klik tombol di bawah ini:</p>', '2012-03-08', '695-618x300.jpg', 'admin', 156, '20:08:00', 'Kamis'),
(43, 'Cargo Service', 'cargo-service', '<p>This is the description of cargo Service. This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service.<br />This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service.<br />This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service.This is the description of cargo Service.</p>\r\n<p>This is the description of cargo Service. This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service.<br />This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service.This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service.<br />This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service. This is the description of cargo Service.This is the description of cargo Service.</p>', '2016-01-14', '95695-618x300.jpg', 'admin', 10, '23:27:25', 'Kamis');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `id_kategori`, `judul`, `username`, `gambar`, `keterangan_gambar`, `tgl_posting`) VALUES
(64, 2, 'Elegant & Glamour', 'admin', 'slide01.jpg', '<p>Temukan koleksi fashion pria dengan berbagai macam aksesorisnya untuk mendukung penampilan anda dimanapun dan kapanpun, yang elegan tampil berani dan berbeda.</p>', '2013-04-05'),
(65, 1, 'Anggun & Menawan', 'admin', 'slide02.jpg', '<p>Tampil anggun dan menawan dan fashionable adalah idaman setiap wanita. Kami sajikan koleksi-koleksi fashion yang sesuai keinginan anda.</p>', '2013-04-05'),
(66, 4, 'Dinamic & Sporty', 'admin', 'slide03.jpg', '<p>Untuk mendukung penampilan santai, fashionable, serta dinamis. Temukan koleksi berbagai macam fashion yang keren sesuai penampilan yang anda inginkan.</p>', '2013-04-10'),
(68, 27, 'Trendy & Funny', 'admin', 'slide04.jpg', '<p>Koleksi pakaian anak-anak yang ceria, cerah dengan berbagai macam pilihan warna yang sesuai dengan fashion style terkini.</p>', '2013-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `alamat` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jam_kerja` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hari_kerja` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `twitter`, `rekening`, `alamat`, `no_telp`, `jam_kerja`, `hari_kerja`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'TerasKreasi', 'rizal_fz@yahoo.com', 'http://localhost/kreasiboutique', 'https://www.facebook.com/terracehousebali', 'TerraceHouseBali', 'Bank Mandiri No Rek 126-00-0524471-9 atas nama Niken Sulanjari', '<p>Jln. Kalibata Selatan<br />Bali&nbsp; - Indonesia</p>', '+62-361-12345678', '09.00 - 17.00 WIB', 'Monday - Saturday', 'Meta deskripsi disini', 'house hold, cargo, furniture, garment, fashion, bali', 'favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Ya',
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `judul`, `username`, `url`, `aktif`, `gambar`, `tgl_posting`) VALUES
(1, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'klan001.jpg', '2013-04-12'),
(2, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'iklan3.jpg', '2013-04-12'),
(3, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Ya', 'iklan4.jpg', '2013-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `iklan_popup`
--

CREATE TABLE `iklan_popup` (
  `id_iklan_popup` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Ya',
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `iklan_popup`
--

INSERT INTO `iklan_popup` (`id_iklan_popup`, `judul`, `username`, `url`, `aktif`, `gambar`, `tgl_posting`) VALUES
(1, 'TerasKreasi', 'admin', 'http://teraskreasi.com/', 'Tidak', 'contoh_popup001.jpg', '2013-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE `katajelek` (
  `id_jelek` int(11) NOT NULL,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `username`, `ganti`) VALUES
(4, 'sex', '', 's**'),
(2, 'bajingan', '', 'b*******'),
(3, 'bangsat', '', 'b******'),
(5, 'tai', '', 't**');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`) VALUES
(3, 'Tas Wanita', '', 'tas-wanita'),
(2, 'Pakaian Pria', '', 'pakaian-pria'),
(1, 'Pakaian Wanita', '', 'pakaian-wanita'),
(4, 'Tas Pria', 'admin', 'tas-pria'),
(27, 'Pakaian Anak', 'admin', 'pakaian-anak');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriblog`
--

CREATE TABLE `kategoriblog` (
  `id_kategoriblog` int(5) NOT NULL,
  `nama_kategoriblog` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kategoriblog_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategoriblog`
--

INSERT INTO `kategoriblog` (`id_kategoriblog`, `nama_kategoriblog`, `username`, `kategoriblog_seo`) VALUES
(2, 'Tips & Trik', 'admin', 'tips--trik'),
(3, 'Kabar-kabari', 'admin', 'kabarkabari'),
(4, 'Dunia Fashion', 'admin', 'dunia-fashion');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_blog` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_blog`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `dibaca`) VALUES
(24, 29, 'Rizal', 'rizal_fzl@yahoo.com', ' mantabsss...   ', '2013-04-12', '16:06:11', 'Y', 'N'),
(25, 29, 'Azzam', 'azzamrabbanirizaldi@gmail.com', ' test   ', '2013-04-12', '16:09:28', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(3) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ongkos_kirim` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_perusahaan`, `nama_kota`, `username`, `ongkos_kirim`) VALUES
(5, 5, 'Jakarta', '', 15000),
(6, 6, 'Bandung', '', 15000),
(7, 5, 'Surabaya', '', 13000),
(8, 5, 'Semarang', '', 17500),
(9, 6, 'Medan', '', 20000),
(10, 6, 'Aceh', '', 25000),
(11, 6, 'Banjarmasin', '', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `kustomer`
--

CREATE TABLE `kustomer` (
  `id_kustomer` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `kode_pos` char(6) COLLATE latin1_general_ci NOT NULL,
  `propinsi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rekening` text COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'kustomer',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `password`, `nama_lengkap`, `alamat`, `kode_pos`, `propinsi`, `kota`, `email`, `no_telp`, `rekening`, `level`, `blokir`, `id_session`) VALUES
('jali', '66bab6414f27e1849265139ca5bba711', 'Jalijali', 'aaa', 'aaa', 'aa', 'Jakarta', 'jali@y.com', '788999', '', 'kustomer', 'N', '2fo7e16mmahtnfm1hqkopvvne4'),
('Simri', '2f702f73f3a5b1556db10be2a0518fcf', 'Simri Nubatonis', 'Jln. Pulau Misol No. 55', '80336', 'Bali', 'Semarang', 'simri_n@yahoo.com', '085338059274', '', 'kustomer', 'N', 'g094ne8g58dpvsnk01mr3c63d7');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(15, '', '', 'logo.png', '2011-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `username`, `nama_menu`, `link`, `aktif`) VALUES
(7, 0, '', 'Home', 'index.php', 'Ya'),
(56, 0, 'admin', 'Blog', 'semua-blog.html', 'Ya'),
(55, 0, 'admin', 'Our Service', 'hal-jasa-pembuatan-website.html', 'Ya'),
(54, 0, 'admin', 'F.A.Q', 'cara-pembelian.html', 'Ya'),
(53, 0, 'admin', 'Our Products', 'semua-produk.html', 'Ya'),
(52, 0, 'admin', 'Profile', 'profil.html', 'Ya'),
(57, 56, 'admin', 'Dunia Fashion', 'kategoriblog-4-dunia-fashion.html', 'Ya'),
(58, 56, 'admin', 'Kabar-kabari', 'kategoriblog-3-kabarkabari.html', 'Ya'),
(59, 56, 'admin', 'Tips & Trik', 'kategoriblog-2-tips--trik.html', 'Ya'),
(60, 0, 'admin', 'Testimony', 'testimoni.html', 'Ya'),
(61, 0, 'admin', 'Contact Us', 'hubungi-kami.html', 'Ya'),
(62, 53, 'admin', 'Pakaian Wanita', 'kategori-1-pakaian-wanita.html', 'Ya'),
(63, 53, 'admin', 'Pakaian Pria', 'kategori-2-pakaian-pria.html', 'Ya'),
(64, 53, 'admin', 'Tas Wanita', 'kategori-3-tas-wanita.html', 'Ya'),
(65, 53, 'admin', 'Tas Pria', 'kategori-4-tas-pria.html', 'Ya'),
(68, 53, 'admin', 'Produk Diskon', 'diskon.html', 'Ya'),
(67, 53, 'admin', 'Pakaian Anak', 'kategori-27-pakaian-anak.html', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Ya',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Ya',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(61, 'Identitas Website', '', '?module=identitas', '<p>Modul untuk mengelola identitas website anda.</p>', '', 'Tidak', 'user', 'Tidak', 1, ''),
(57, 'Menu Website', '', '?module=menu', '', '', 'Ya', 'user', 'Ya', 2, ''),
(59, 'Halaman Baru', '', '?module=halamanstatis', '', '', 'Ya', 'user', 'Ya', 4, ''),
(77, 'Profil', 'admin', '?module=profil', '', '', 'Ya', 'user', 'Ya', 5, ''),
(78, 'Kata Sambutan', 'admin', '?module=sambutan', '', '', 'Ya', 'user', 'Ya', 6, ''),
(79, 'Produk', 'admin', '?module=produk', '', '', 'Ya', 'user', 'Ya', 7, ''),
(80, 'Kategori Produk', 'admin', '?module=kategori', '', '', 'Ya', 'user', 'Ya', 8, ''),
(81, 'Cara Pembelian', 'admin', '?module=carabeli', '', '', 'Ya', 'user', 'Ya', 9, ''),
(82, 'Order Masuk', 'admin', '?module=order', '', '', 'Ya', 'user', 'Ya', 10, ''),
(83, 'Ongkos Kirim', 'admin', '?module=ongkoskirim', '', '', 'Ya', 'user', 'Ya', 11, ''),
(84, 'Jasa Pengiriman', 'admin', '?module=jasapengiriman', '', '', 'Ya', 'user', 'Ya', 12, ''),
(85, 'Laporan Penjualan', 'admin', '?module=laporan', '', '', 'Ya', 'user', 'Ya', 13, ''),
(86, 'Katalog', 'admin', '?module=download', '', '', 'Ya', 'user', 'Ya', 14, ''),
(87, 'Bank Pembayaran', 'admin', '?module=bank', '', '', 'Ya', 'user', 'Ya', 15, ''),
(88, 'Blog', 'admin', '?module=blog', '', '', 'Ya', 'user', 'Ya', 16, ''),
(89, 'Kategori Blog', 'admin', '?module=kategoriblog', '', '', 'Ya', 'user', 'Ya', 17, ''),
(90, 'Tag Blog', 'admin', '?module=tag', '', '', 'Ya', 'user', 'Ya', 18, ''),
(91, 'Komentar Blog', 'admin', '?module=komentar', '', '', 'Ya', 'user', 'Ya', 19, ''),
(92, 'Sensor Komentar', 'admin', '?module=katajelek', '', '', 'Ya', 'user', 'Ya', 20, ''),
(93, 'Iklan PopUp', 'admin', '?module=iklan_popup', '', '', 'Ya', 'user', 'Ya', 21, ''),
(94, 'Banner', 'admin', '?module=banner', '', '', 'Ya', 'user', 'Ya', 22, ''),
(95, 'Pasang Iklan', 'admin', '?module=iklan', '', '', 'Ya', 'user', 'Ya', 23, ''),
(96, 'Logo Website', 'admin', '?module=logo', '', '', 'Ya', 'user', 'Ya', 24, ''),
(97, 'Template Website', 'admin', '?module=templates', '', '', 'Ya', 'user', 'Ya', 25, ''),
(98, 'Header Website', 'admin', '?module=header', '', '', 'Ya', 'user', 'Ya', 26, ''),
(99, 'Maintenance', 'admin', '?module=perbaikan', '', '', 'Ya', 'user', 'Ya', 27, ''),
(100, 'Background Website', 'admin', '?module=background', '', '', 'Ya', 'user', 'Ya', 28, ''),
(101, 'Pesan Masuk', 'admin', '?module=hubungi', '', '', 'Ya', 'user', 'Ya', 29, ''),
(102, 'Testimoni', 'admin', '?module=testimoni', '', '', 'Ya', 'user', 'Ya', 30, ''),
(103, 'Peta', 'admin', '?module=peta', '', '', 'Ya', 'user', 'Ya', 31, ''),
(104, 'Yahoo Mesanger', 'admin', '?module=ym', '', '', 'Ya', 'user', 'Ya', 32, ''),
(105, 'Manajemen User', 'admin', '?module=user', '', '', 'Ya', 'admin', 'Ya', 33, ''),
(106, 'Manajemen Kustomer', 'admin', '?module=kustomer', '', '', 'Ya', 'admin', 'Ya', 34, ''),
(107, 'Manajemen Modul', 'admin', '?module=modul', '<p>testttts</p>', '', 'Ya', 'admin', 'Ya', 35, '');

-- --------------------------------------------------------

--
-- Table structure for table `mod_bank`
--

CREATE TABLE `mod_bank` (
  `id_bank` int(5) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_bank`
--

INSERT INTO `mod_bank` (`id_bank`, `nama_bank`, `username`, `no_rekening`, `pemilik`, `gambar`) VALUES
(1, 'Mandiri', '', '1260005244719', 'Niken Sulanjari', 'Mandiri.png'),
(14, 'BCA', 'admin', '6721113335', 'Rizal Faizal', 'bank_bca.png');

-- --------------------------------------------------------

--
-- Table structure for table `mod_ym`
--

CREATE TABLE `mod_ym` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mod_ym`
--

INSERT INTO `mod_ym` (`id`, `nama`, `username`) VALUES
(4, 'Simri Nubatonis', 'simri_n');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `username`) VALUES
(8, 'simri_n@yahoo.com', 'admin'),
(9, 'rizal_fzl@yahoo.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(10) NOT NULL,
  `id_kustomer` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat_kirim` text COLLATE latin1_general_ci NOT NULL,
  `kode_pos_kirim` char(6) COLLATE latin1_general_ci NOT NULL,
  `propinsi_kirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kota_kirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status_order` char(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru',
  `pembayaran` text COLLATE latin1_general_ci NOT NULL,
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `shipping` char(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'akun'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_kustomer`, `alamat_kirim`, `kode_pos_kirim`, `propinsi_kirim`, `kota_kirim`, `status_order`, `pembayaran`, `tgl_order`, `jam_order`, `shipping`) VALUES
(14, 'Simri', '', '', '', '', 'Baru', '', '2017-02-22', '09:06:09', 'akun');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `jumlah`) VALUES
(13, 200, 1),
(13, 201, 1),
(12, 202, 1),
(14, 201, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE `orders_temp` (
  `id_orders_temp` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `id_produk`, `id_session`, `jumlah`, `tgl_order_temp`, `jam_order_temp`, `stok_temp`) VALUES
(247, 215, 'p188secb6oinsfkb85uu5b6uf3', 3, '2017-08-20', '23:58:21', 80),
(248, 198, 's3d07ps689i7jbdt998vkpgi21', 1, '2020-06-25', '02:10:12', 50);

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(5) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `judul_perbaikan` varchar(100) NOT NULL,
  `warna` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kuota` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `tanggal`, `judul_perbaikan`, `warna`, `kuota`) VALUES
(1, '2013,02,30', 'Kami sedang melakukan perbaikan.', '4', '<p>Silahkan kembali di lain waktu. Terima kaih atas kunjungan anda.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id_peta` int(5) NOT NULL,
  `width` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `height` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `latitude` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `longtitude` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peta`
--

INSERT INTO `peta` (`id_peta`, `width`, `height`, `latitude`, `longtitude`) VALUES
(1, '960', '200', '106.841472', '-6.264899');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `produk_seo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `headline` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1',
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `diskon` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `username`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `headline`, `tgl_masuk`, `gambar`, `dibeli`, `dibaca`, `diskon`) VALUES
(184, 1, 'Nikoo Sadie Dress ', 'admin', 'nikoo-sadie-dress-', '<p>Nikoo menghadirkan busana dengan material berkualitas masa kini berkualitas tinggi seperti lace, katun dan sebagainya. Brand ini terinspirasi dari gaya kaum urban yang dinamis dan berkarakter. Desainer dibalik Nikoo adalah perempuan cantik bernama Nikeeta Lakhiani atau yang akrab dipanggil Niki. Niki menawarkan gaya high street dalam berbagai kultur masyarakat kota besar. Dalam rancangannya, Niki kerap terinspirasi dari merk busana kelas dunia seperti YSL, Balenciaga serta mencontohkan supermodel Agyness Deyn sebagai sosok perempuan dengan fashion yang berciri kuat. Kekuatan fashion Niki ini kami hadirkan khusus untuk Anda yang memperhatikan penampilan berkelas. Segera dapatkan koleksi NIKOO hanya di Kreasi Boutique. <br /><br /></p>', 545000, 70, '0.50', 'Y', '2013-04-15', '53wnt001.jpg', 15, 25, 10),
(213, 3, 'Phantasia Neon Green', 'admin', 'phantasia-neon-green', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Neon Green</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Bag Size</td>\r\n<td>Dimensi 42 x 11 x 35 cm</td>\r\n</tr>\r\n</tbody>\r\n</table>', 219000, 89, '1.00', 'N', '2013-04-15', '42tsw006.jpg', 5, 13, 0),
(185, 1, 'Leaf Green Jacket ', 'admin', 'leaf-green-jacket-', '<p>Ada begitu banyak koleksi baju wanita di pasaran kadang membuat Anda bingung sendiri. Leaf hadir di tengah keraguan dengan menjawab segala kebutuhan penampilan kita. Koleksi spring, summer, fall, dan winter sangat lengkap dan menarik untuk dimiliki. Kebutuhan pakaian segala suasana disediakan Leaf agar Anda bisa mudah memilih di satu tempat belanja. Model dan desainnya pun cocok dalam berbagai aktifitas tanpa mengesampingkan tren terkini. Ditambah dengan keuntungan harga yang terjangkau, kita seakan tidak memiliki alasan untuk tidak menyukai merek ini.<br /><br /></p>', 249000, 88, '0.50', 'Y', '2013-04-15', '93wnt002.jpg', 14, 38, 0),
(186, 2, 'Sixpax Black Jacket', 'admin', 'sixpax-black-jacket', '<p>Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh.Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.</p>', 309000, 0, '0.50', 'Y', '2013-04-15', '48pr001.jpg', 6, 20, 0),
(215, 1, 'BellaBaric Blouse Tribal Batwing ', 'admin', 'bellabaric-blouse-tribal-batwing-', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Dark Yellow</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Machine wash, cold water, do not bleach, do not tumble dry, low iron.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.</p>', 279000, 80, '0.50', 'Y', '2013-04-18', '19bellabaric1.jpg', 54, 55, 10),
(188, 2, 'Atypical Man Shirt', 'admin', 'atypical-man-shirt', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 200px;\">Warna</td>\r\n<td>White/Red</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 200px;\">Care label</td>\r\n<td>Hand wash, do not bleach, do not tumble dry, low iron.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br /></p>', 269000, 89, '0.50', 'Y', '2013-04-15', '82pr002.jpg', 9, 11, 0),
(189, 4, 'MiPac Classic Backpack Grey', 'admin', 'mipac-classic-backpack-grey', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Grey</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Bag Size</td>\r\n<td>Dimensi 41 x 30 x 15 cm (17 L)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br /></p>', 449000, 78, '1.00', 'Y', '2013-04-15', '28ts001.jpg', 11, 13, 15),
(190, 27, 'Babygro Polo Shirt ', 'admin', 'babygro-polo-shirt-', '<p>Bagi yang sudah memiliki anak, tentunya ingin anak Anda terlihat menarik dalam balutan busana yang cocok di tubuh mungilnya. Khususnya jika Anda memiliki anak laki-laki, label <strong>Babygro</strong> merupakan label yang tepat untuk memenuhi setiap kebutuhan pakaiannya. Merek ini menawarkan produk anak bergaya kasual yang trendi dan cocok untuk dipakai ke mana saja. Selain desain yang atraktif, label ini pun menawarkan kelebihan lainnya. Setiap produk yang dihasilkan dibuat dengan bahan berkualitas sehingga nyaman dan aman untuk kulit lembut si kecil. Sekarang, tidak hanya Anda yang dapat tampil trendi dan <em>fashionable</em>, karena dengan <em>Babygro</em>, buah hati Anda pun memiliki kesempatan yang sama untuk tampil gaya dalam segala suasana.</p>', 139900, 89, '0.50', 'N', '2013-04-15', '51ank001.jpg', 4, 5, 10),
(191, 4, 'Tolliver Dane Black', 'admin', 'tolliver-dane-black', '<p>Tolliver adalah tempat perhentian bagi Anda yang sedang mencari koleksi pakaian, sepatu, hingga tas untuk wanita maupun pria yang mengikuti tren masa kini. Berbagai macam produk yang terdapat dalam label ini secara eksklusif hanya bisa diperoleh di KreasiBoutique Indonesia. Aneka alas kaki serta pakaian dan tas koleksi label ini sekarang didapatkan dengan mudah untuk memenuhi dahaga Anda akan tren terbaru. Dengan mengusung gaya yang kontemporer, Tolliver menghadirkan koleksi sandang yang semiformal, stylish but affordable.</p>', 279000, 78, '1.00', 'N', '2013-04-15', '91ts002.jpg', 11, 12, 0),
(192, 4, 'Phantasia Bright Backpack Blue', 'admin', 'phantasia-bright-backpack-blue', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 200px;\">Warna</td>\r\n<td>Blue</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 200px;\">Bag Size</td>\r\n<td>Dimensi: 42 x 11 x 35 cm</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.</p>', 219000, 80, '1.00', 'N', '2013-04-15', '14ts003.jpg', 10, 13, 5),
(193, 4, 'Nautilus Mini Bag Orange', 'admin', 'nautilus-mini-bag-orange', '<p>Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.</p>', 499000, 67, '0.80', 'N', '2013-04-15', '22ts004.jpg', 8, 22, 0),
(194, 4, 'MiPac Nordic Backpack Green', 'admin', 'mipac-nordic-backpack-green', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 200px;\">Warna</td>\r\n<td>Green</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 200px;\">Bag Size</td>\r\n<td>Dimensi 41 x 30 x 15 cm (17 L)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.</p>', 449000, 89, '1.00', 'N', '2013-04-15', '34ts005.jpg', 8, 12, 0),
(195, 4, 'Hellolulu Laptop Backpack', 'admin', 'hellolulu-laptop-backpack', '<p>Logan-Nylon Laptop All Day Backpack 15\" Khaki dari Hellolulu. Tas laptop warna <em>khaki </em>dari bahan <em>nylon</em>. Pas untuk laptop MacBook Air ukuran 11 inci atau MacBook Pro paling besar ukuran 15 inci. Terdapat <em>slip pocket</em> untuk iPad pada bagian dalam.<br /><br />Untuk laptop bags, <strong>Hellolulu</strong> menawarkan produk yang kokoh, cerah, dan bergaya, tas laptop ini sebagai respon dari produk-produk serupa di pasaran yang terlalu maskulin. Keunggulan camera bags ini terletak pada desainnya yang terkesan modern dengan warna-warna cerah, berbeda dengan desain camera bags lain yang terkesan kolot dan dingin. Begitu pula dengan desain ipod case yang dinamis dan sesuai dengan selera anak muda masa kini. Untuk travel accessories, <em>Helloulu</em> membuat agar produk ini meringankan beban para pelancong dengan mengefisienkan desain agar proses pengepakan dan pengaturan di koper Anda menjadi lebih mudah.</p>', 899000, 89, '1.00', 'N', '2013-04-15', '91ts006.jpg', 17, 23, 20),
(196, 2, 'Shirtbank Brand Name', 'admin', 'shirtbank-brand-name', '<p>KreasiBoutique mempersembahkan ShirtBank. Label yang terdiri dari koleksi unik ini dihadirkan khusus bagi para pecinta fashion di tanah air. Indahnya masa muda dipadu dengan warna-warni hidup menggambarkan deretan apparel yang disediakan label ini. Koleksi-koleksinya cocok untuk momen-momen santai bagi orang-orang berjiwa muda yang aktif dan dinamis. Macam-macam material bahan pakaian yang digunakan ShirtBank menjamin Anda untuk selalu tetap nyaman mengenakannya. Dengan bahan kain yang tidak terlalu tebal dan juga tidak terlalu tipis, label ini cocok untuk dijadikan koleksi pakaian di lemari Anda.</p>', 139900, 80, '0.50', 'Y', '2013-04-15', '68pr003.jpg', 8, 16, 10),
(197, 2, 'Salt n Pepper Short', 'admin', 'salt-n-pepper-short', '<p>Salt n Pepper khusus menjadi <em>retailer</em> pakaian-pakaian dan aksesoris kasual pria. Target pasar merek ini adalah laki-laki mulai dari usia 20 tahun hingga 45 tahun. Melalui toko-tokonya yang tersebar di seluruh Indonesia, merek ini berusaha memberikan produk dengan kualitas tinggi, inovatif, dan <em>fashionable</em>, dengan harga yang terjangkau. Didirikan pada tahun 2000, <em>Salt n Pepper</em> telah sepenuhnya memantapkan labelnya sebagai salah satu merek yang sukses dalam mencerminkan gaya hidup pemakainya dalam waktu kurang dari satu dekade.<br /><br />Harga yang ditawarkan merek ini sangat cocok dengan kantong masyarakat Indonesia pada umumnya. Anda tidak perlu mengelilingi seluruh toko mereka untuk mendapatkan koleksi terbaru Salt n Pepper, karena Anda dapat memperoleh produk mereka melalui situs belanja online. Belanja sekarang juga kemeja, celana panjang, atau celana pendek di toko belanja online terpercaya dan teraman di Indonesia, KreasiBoutique. Selamat berbelanja!</p>', 263900, 56, '0.50', 'N', '2013-04-15', '70pr004.jpg', 11, 15, 0),
(198, 2, 'Adidas Ac Milan Jersey', 'admin', 'adidas-ac-milan-jersey', '<p>Adidas berdiri sejak tahun 1920-an dan berhasil mempertahankan eksistensinya di dunia modern sports. Berawal dari mimpi Adi Dassler untuk membuat sepatu olahraga terbaik, yang hingga sekarang berkembang ke produk &ndash; produk olahraga lainnya. Karena sulitnya mendapatkan bahan kulit pada masa pasca Perang Dunia II, sepatu Adidas pertama terbuat dari bahan kanvas yang tersedia pada masa tersebut. Keuletan Adolf Dassler dalam membuat sepatu membuahkan hasil saat pelari Jesse Ownes mengenakan sepatu Adidas pada Olimpiade di tahun 1936.<br /><br />Selama lebih dari 80 tahun lamanya, Adidas telah menjadi bagian dari dunia olahraga di semua bidang dengan menawarkan sepatu, pakaian serta beragam aksesoris pelengkap olahraga yang bernilai seni pada setiap produknya dan mempromosikan atlet &ndash; atlet terkenal pada iklan produk-produknya antara lain Muhammad Ali, Sepp Herberger, David Beckham, Zinedine Zidane, Raul Gonzalez, Michael Ballack, Kaka, Rui Costa dan lainnya.</p>', 649000, 50, '0.50', 'N', '2013-04-15', '83pr005.jpg', 8, 14, 0),
(199, 1, 'Lois Jeans Long Sleeves', 'admin', 'lois-jeans-long-sleeves', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Chambray</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Machine wash at 140 F, do not bleach, dry clean, iron up to 225 F.</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Composition</td>\r\n<td>cotton</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Dari banyaknya merek jeans saat ini, Lois Jeans merupakan salah satu yang terbaik. Pertama kali di buat pada tahun 60an oleh Saez Merino bersaudara asal Spanyol. Produk Lois Jeans tidak hanya celana jeans tetapi juga pakaian lainnya berbahan dasar denim. Produk-produk dari Lois Jeans sangat populer di Spanyol.</p>', 269000, 89, '0.70', 'N', '2013-04-15', '97wnt004.jpg', 17, 25, 0),
(200, 2, 'Fila Jacket Hooded-Pietro', 'admin', 'fila-jacket-hoodedpietro', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Green</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Machine wash, warm water, do not bleach, low tumble dry, medium ironing on reverse, mild and non chlorine detergent.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Kekuatan FILA Indonesia ada pada gabungan antara sport dan fashion. Garis sport yang kental dipadu dengan kekuatan fashion yang manis membuat FILA berbeda dengan brand fashion lainnya. FILA Indonesia selalu up to date mengikuti mode yang sedang trend. Kesan konservatif yang dulu sempat terlintas, kini tidak didapati lagi karena kini FILA juga aktif menggandeng artis dan penyanyi terkenal seperti boyband Big Bang dari Korea. Mau jadi bagian dari sejarah sportswear legenda ini? Cek katalognya di Kreasi Boutique..</p>', 379000, 88, '0.80', 'Y', '2013-04-15', '65pr006.jpg', 23, 27, 10),
(201, 1, 'Triset Ladies Short Sleeve', 'admin', 'triset-ladies-short-sleeve', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Mult Colour</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Do not bleach, do not tumble dry.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.</p>', 239000, 80, '0.70', 'Y', '2013-04-15', '95wnt005.jpg', 24, 28, 10),
(202, 1, 'Sessa Blus Pink', 'admin', 'sessa-blus-pink', '<p>Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br /></p>', 729000, 80, '0.80', 'Y', '2013-04-15', '64wnt006.jpg', 19, 22, 0),
(203, 27, 'Domii Check Blue Shirt', 'admin', 'domii-check-blue-shirt', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Blue</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Hand wash, do not bleach, cool iron, dry clean.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Domii merilis koleksi Shirts untuk gaya kasual anak. Kemeja corak kotak yang nyaman dipakai sepanjang hari. Pas dipadukan dengan jeans atau <em>pants</em> pilihan.</p>', 399000, 80, '0.50', 'Y', '2013-04-15', '40ank002.jpg', 8, 13, 0),
(204, 27, 'Trendy Cybkidz Performance', 'admin', 'trendy-cybkidz-performance', '<p>Cybkidz dikenal sebagai merek pakaian anak laki-laki. Koleksi celana, jas, dan scarf tersedia untuk melengkapi dan memberi solusi agar pangeran kecil Anda tidak hanya bergaya dengan kaos dan kemeja saja. Brand yang spesialisasinya memproduksi pakaian anak ini sangat paham kebutuhan si kecil. Oleh karena itu, perusahaan konveksi ini menciptakan bermacam kebutuhan pakaian anak. Melalui teknologi yang handal, pengerjaan super teliti dan menggunakan bahan yang berkualitas, perusahaan ini masih terus eksis hingga sekarang. Produk celana <em>Cybkidz</em> pun dapat dipakai dalam berbagai suasana. Misalnya, celana jeans untuk bergaya pada saat liburan, celana pendek <em>khaki</em> pas digunakan sewaktu santai atau celana bahan warna hitam yang dipakai dalam acara resmi. Anda tidak perlu lagi bingung memilih baju anak ketika mengajaknya ke acara resmi atau sekedar kumpul keluarga. Bersiaplah akan banyak mata yang memandang saat anak Anda memakainya.</p>', 209000, 70, '0.50', 'N', '2013-04-15', '35ank004.jpg', 4, 7, 0),
(205, 27, 'Surfer Girl Coral', 'admin', 'surfer-girl-coral', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Coral</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Cold water. Gentle hand wash. Do not bleach. Only cool iron</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Gunakan Manta Ray Sweater, <em>cardigan</em> tangan panjang keluaran Surfer Girl. Warna <em>coral</em> yang ceria dan model yang <em>simple</em> membuat luaran ini cocok dipadankan dengan dalaman bercorak. Potongannya yang pas membuat tubuh pemakainya terlihat sempurna.</p>', 299000, 80, '0.50', 'Y', '2013-04-15', '66ank007.jpg', 17, 31, 10),
(206, 27, 'Hindi Kidstyle', 'admin', 'hindi-kidstyle', '<p>Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br /><br /></p>', 349000, 80, '0.50', 'N', '2013-04-15', '36ank006.jpg', 4, 5, 0),
(207, 27, 'Purple Kidstyle', 'admin', 'purple-kidstyle', '<p>Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br /></p>', 249000, 0, '0.60', 'N', '2013-04-15', '39ank003.jpg', 6, 8, 0),
(214, 3, 'Tolliver Leena Handbag Green', 'admin', 'tolliver-leena-handbag-green', '<p>Tolliver adalah tempat perhentian bagi Anda yang sedang mencari koleksi pakaian, sepatu, hingga tas untuk wanita maupun pria yang mengikuti tren masa kini. Berbagai macam produk yang terdapat dalam label ini secara eksklusif hanya bisa diperoleh di ZALORA Indonesia. Aneka alas kaki serta pakaian dan tas koleksi label ini sekarang didapatkan dengan mudah untuk memenuhi dahaga Anda akan tren terbaru. Dengan mengusung gaya yang kontemporer, <em>Tolliver</em> menghadirkan koleksi sandang yang semiformal, <em>stylish but affordable</em>.</p>', 299000, 79, '1.00', 'N', '2013-04-18', '8tolliver-4.jpg', 14, 14, 0),
(209, 3, 'Noche Riley Shoulder Blue', 'admin', 'noche-riley-shoulder-blue', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Blue</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Bag Size</td>\r\n<td>Dimensi 34 x 15 x 28 cm, dimensi pouch 14 x 13 cm</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Isi keterangan produk di sini.&nbsp; Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh. Isi keterangan produk di sini. Teks ini hanyalah contoh.<br /><br /><br /></p>', 499000, 70, '1.00', 'N', '2013-04-15', '26tsw002.jpg', 10, 12, 0),
(210, 3, 'Symbolize Hand Bag Apricot', 'admin', 'symbolize-hand-bag-apricot', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Apricot</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Put in the dust bag with silica gel.</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Bag Size</td>\r\n<td>Dimensi: 29 x 10.5 x 23 cm, handle drop 12 cm, panjang adjustable strap maksimal 125 cm.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />Tampil <em>stylish</em> dengan Symbolize Nadin Hand Bag Apricot. <em>Hand bag</em> dengan model simpel yang pas menemani aktivitas harian. <em>Sling strap</em> terasa praktis saat dikenakan. <em>Effortless chic and perfect for casual look!<br /></em><br />Tas warna <em>apricot</em> dari bahan PU <em>leather</em>. <em>Zipper closure</em>. Detail <em>inner zippered pocket</em>, <em>gadget pouch</em> dan kantong belakang. Dimensi: 29 x 10.5 x 23 cm, <em>handle drop</em> 12 cm, panjang <em>adjustable strap</em> maksimal 125 cm.</p>', 399000, 69, '1.00', 'N', '2013-04-15', '21tsw003.jpg', 6, 10, 20),
(211, 3, 'Quinna Hand Bag Purple', 'admin', 'quinna-hand-bag-purple', '<table class=\"ui-grid ui-gridFull prd-attributes\">\r\n<tbody>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Warna</td>\r\n<td>Purple</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Care label</td>\r\n<td>Put in the dust bag with silica gel.</td>\r\n</tr>\r\n<tr class=\"odd\">\r\n<td style=\"width: 50px;\">Bag Size</td>\r\n<td>Dimensi ukuran: 35 x 16 x 20 cm - Handle drop: 9 cm - Adjustable strap: 68 cm</td>\r\n</tr>\r\n</tbody>\r\n</table>', 399000, 89, '1.00', 'N', '2013-04-15', '62tsw004.jpg', 6, 13, 20),
(212, 3, 'Tolliver Dane Soft Pink', 'admin', 'tolliver-dane-soft-pink', '<p>Rangkaian tas yang dihadirkan label ini bermaterialkan kulit asli, maupun kulit sintetik. Jika Anda adalah seorang profesional yang diharuskan senantiasa tampil formal dan semiformal, <em>Tolliver</em> menjawab semua kebutuhan Anda. Jika Anda suka berpenampilan penuh warna tapi tidak berkesan &acirc;&euro;&oelig;nabrak&acirc;&euro;Â, Anda pasti akan sangat menyukai label ini. Koleksi yang tersedia memberi kesan resmi, sambil tetap memberi sentuhan santai dan profesional.</p>\r\n<p>&nbsp;</p>\r\n<p>Untuk melengkapi penampilan Anda, pasangkan busana yang Anda kenakan dengan koleksi sandal kasual dari Tolliver. Warna hitam di bagian alasnya dan hiasan warna-warna blok di bagian kap membuat sandal-sandal ini tidak akan mendominasi penampilan keseluruhan Anda. Pastinya, Anda bisa tampil cantik dan percaya diri tanpa usaha yang besar dengan koleksi alas kaki dan pakaian dari <em>Tolliver</em>.</p>', 279000, 80, '1.00', 'N', '2013-04-15', '21tsw005.jpg', 6, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_profil` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `username`, `judul`, `judul_seo`, `isi_profil`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`) VALUES
(5, 'admin', 'About Us', 'about-us', 'Terrace House Bali is a unique one stop shop that features a diverse bouquet of International designers of the fashion industry of today. A wardrobe handpicked and selected to bring a glamorous yet effortless style into the international woman\'s wardrobe.It is a business that\'s currently organized as a Sole Proprietorship.', 'Rabu', '2013-04-03', '09:40:00', '56ban_profil.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id_sambutan` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_sambutan` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id_sambutan`, `username`, `judul`, `judul_seo`, `isi_sambutan`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`) VALUES
(5, 'admin', 'Welcome To Terrace House Bali', 'selamat-datang-di-kreasiboutique', 'Terrace House Bali is a unique one stop shop that features a diverse bouquet of International designers of the fashion industry of today. A wardrobe handpicked and selected to bring a glamorous yet effortless style into the international woman\'s wardrobe.It is a business that\'s currently organized as a Sole Proprietorship. ', 'Rabu', '2013-04-03', '09:40:00', '30welcome_pic.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL,
  `info` varchar(700) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`, `aktif`) VALUES
(7, 'CMS Toko Online yang elegan...cocok untuk usaha anda...apapun usaha \r\nanda...Bila anda berminat order atau memiliki web ini, slahkan kontak: <strong>021. 32972759 </strong>atau<strong> kontak YM.&nbsp;&nbsp;</strong>\r\n', '2011-08-22', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `shop_pengiriman`
--

CREATE TABLE `shop_pengiriman` (
  `id_perusahaan` int(10) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_pengiriman`
--

INSERT INTO `shop_pengiriman` (`id_perusahaan`, `nama_perusahaan`, `username`, `gambar`) VALUES
(6, 'JNE', '', ''),
(5, 'TIKI', '', ''),
(7, 'POS EKSPRESS', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.1', '2011-11-25', 10, '1322188233'),
('127.0.0.1', '2011-11-24', 12, '1322151892'),
('127.0.0.1', '2011-11-23', 17, '1322066503'),
('127.0.0.1', '2011-11-22', 1, '1321973495'),
('127.0.0.1', '2011-11-21', 20, '1321846307'),
('127.0.0.1', '2011-11-18', 8, '1321599748'),
('127.0.0.1', '2011-11-17', 45, '1321547836'),
('127.0.0.1', '2011-12-02', 7, '1322837213'),
('127.0.0.1', '2011-12-03', 2, '1322891022'),
('127.0.0.1', '2011-12-04', 150, '1322979638'),
('127.0.0.1', '2011-12-05', 5, '1323059962'),
('127.0.0.1', '2011-12-07', 4, '1323242540'),
('127.0.0.1', '2011-12-09', 29, '1323447750'),
('127.0.0.1', '2011-12-10', 10, '1323508319'),
('127.0.0.1', '2011-12-24', 50, '1324745961'),
('127.0.0.1', '2011-12-25', 65, '1324832093'),
('127.0.0.1', '2011-12-26', 1, '1324886015'),
('127.0.0.1', '2012-01-06', 3, '1325793208'),
('127.0.0.1', '2012-01-10', 11, '1326211875'),
('127.0.0.1', '2012-01-11', 32, '1326281716'),
('127.0.0.1', '2012-02-11', 8, '1328977159'),
('127.0.0.1', '2012-02-13', 66, '1329147832'),
('127.0.0.1', '2012-02-14', 9, '1329201672'),
('127.0.0.1', '2002-02-14', 1, '1013636235'),
('127.0.0.1', '2012-02-18', 56, '1329583276'),
('127.0.0.1', '2012-02-19', 4, '1329624966'),
('127.0.0.1', '2012-01-20', 8, '1327043558'),
('127.0.0.1', '2012-02-21', 6, '1329816252'),
('127.0.0.1', '2012-02-22', 39, '1329928689'),
('127.0.0.1', '2012-02-23', 2, '1329997845'),
('127.0.0.1', '2012-02-24', 51, '1330099809'),
('127.0.0.1', '2012-02-25', 9, '1330109456'),
('127.0.0.1', '2012-02-28', 1, '1330413613'),
('127.0.0.1', '2012-03-05', 1, '1330954288'),
('127.0.0.1', '2012-03-09', 69, '1331247756'),
('127.0.0.1', '2012-03-11', 1, '1331472068'),
('127.0.0.1', '2012-03-22', 1, '1332435236'),
('127.0.0.1', '2012-03-27', 33, '1332834520'),
('127.0.0.1', '2012-03-28', 1, '1332911962'),
('127.0.0.1', '2012-03-29', 17, '1333002086'),
('127.0.0.1', '2012-03-31', 2, '1333178859'),
('127.0.0.1', '2012-04-02', 7, '1333334839'),
('127.0.0.1', '2012-04-03', 9, '1333422072'),
('127.0.0.1', '2012-04-06', 17, '1333719702'),
('127.0.0.1', '2012-04-07', 1, '1333805826'),
('127.0.0.1', '2012-04-11', 2, '1334122109'),
('127.0.0.1', '2012-04-12', 1, '1334200992'),
('127.0.0.1', '2012-04-16', 2, '1334539752'),
('127.0.0.1', '2012-04-18', 11, '1334755714'),
('127.0.0.1', '2012-04-24', 27, '1335263898'),
('127.0.0.1', '2012-04-26', 3, '1335433015'),
('127.0.0.1', '2012-04-29', 1, '1335696239'),
('127.0.0.1', '2012-05-01', 10, '1335848592'),
('127.0.0.1', '2012-05-02', 2, '1335898903'),
('127.0.0.1', '2012-05-15', 49, '1337097643'),
('127.0.0.1', '2012-05-16', 1, '1337156117'),
('127.0.0.1', '2012-06-04', 3, '1338782746'),
('127.0.0.1', '2012-06-06', 4, '1338999898'),
('127.0.0.1', '2012-06-07', 2, '1339069462'),
('127.0.0.1', '2012-06-10', 3, '1339344252'),
('127.0.0.1', '2012-06-11', 3, '1339432341'),
('127.0.0.1', '2012-06-12', 3, '1339505046'),
('::1', '2012-06-19', 1, '1340118089'),
('::1', '2012-06-20', 6, '1340197400'),
('::1', '2012-06-25', 1, '1340630504'),
('::1', '2012-06-26', 25, '1340729981'),
('::1', '2012-06-27', 513, '1340813125'),
('127.0.0.1', '2012-06-27', 2, '1340782067'),
('::1', '2012-06-29', 9, '1340975084'),
('::1', '2012-06-30', 113, '1341072194'),
('127.0.0.1', '2012-06-30', 4, '1341059103'),
('::1', '2012-07-01', 148, '1341161833'),
('127.0.0.1', '2012-07-02', 62, '1341233078'),
('::1', '2012-07-02', 104, '1341240435'),
('::1', '2012-07-03', 130, '1341334342'),
('127.0.0.1', '2012-07-04', 2, '1341335416'),
('::1', '2012-07-04', 118, '1341414923'),
('::1', '2012-07-05', 21, '1341501225'),
('::1', '2012-07-06', 100, '1341591024'),
('::1', '2012-07-07', 23, '1341676801'),
('::1', '2012-07-09', 1, '1341830276'),
('::1', '2012-07-10', 21, '1341931692'),
('::1', '2012-07-11', 21, '1342024781'),
('127.0.0.1', '2012-07-12', 2, '1342027912'),
('::1', '2012-07-12', 6, '1342031060'),
('::1', '2012-07-13', 6, '1342192738'),
('::1', '2012-07-14', 47, '1342281606'),
('127.0.0.1', '2012-07-15', 16, '1342298442'),
('::1', '2012-07-16', 2, '1342447168'),
('::1', '2012-07-17', 3, '1342543284'),
('::1', '2012-07-18', 34, '1342597742'),
('::1', '2012-07-20', 3, '1342723923'),
('::1', '2012-07-25', 1, '1343149725'),
('127.0.0.1', '2013-04-04', 3, '1365093278'),
('127.0.0.1', '2013-04-05', 3, '1365165817'),
('127.0.0.1', '2013-04-07', 1, '1365336570'),
('127.0.0.1', '2013-04-09', 1, '1365498958'),
('127.0.0.1', '2013-04-10', 2, '1365583475'),
('127.0.0.1', '2013-04-11', 2, '1365669001'),
('127.0.0.1', '2013-04-12', 695, '1365785962'),
('127.0.0.1', '2013-04-13', 327, '1365869565'),
('127.0.0.1', '2013-04-14', 229, '1365958792'),
('127.0.0.1', '2013-04-15', 555, '1366041525'),
('127.0.0.1', '2013-04-16', 84, '1366131100'),
('127.0.0.1', '2013-04-17', 8, '1366209814'),
('127.0.0.1', '2013-04-18', 153, '1366294946'),
('127.0.0.1', '2013-04-19', 39, '1366373452'),
('127.0.0.1', '2013-04-20', 1, '1366403811'),
('127.0.0.1', '2013-04-21', 10, '1366539783'),
('127.0.0.1', '2013-04-22', 14, '1366581773'),
('127.0.0.1', '2013-04-23', 112, '1366705146'),
('127.0.0.1', '2013-04-24', 5, '1366811728'),
('127.0.0.1', '2013-04-25', 21, '1366900252'),
('127.0.0.1', '2013-04-26', 15, '1366964829'),
('127.0.0.1', '2013-04-27', 41, '1367081869'),
('127.0.0.1', '2013-04-28', 19, '1367158639'),
('127.0.0.1', '2013-04-29', 5, '1367249348'),
('127.0.0.1', '2013-04-30', 17, '1367288966'),
('127.0.0.1', '2013-08-14', 174, '1376497684'),
('::1', '2013-08-14', 12, '1376483305'),
('::1', '2013-10-14', 2, '1381732761'),
('127.0.0.1', '2013-10-14', 1, '1381733044'),
('::1', '2015-06-29', 2, '1435547799'),
('::1', '2016-01-14', 126, '1452790451'),
('::1', '2016-01-15', 44, '1452872286'),
('127.0.0.1', '2016-01-15', 4, '1452872170'),
('::1', '2016-01-16', 1, '1452919024'),
('::1', '2017-02-22', 23, '1487729322'),
('::1', '2017-08-20', 9, '1503248329'),
('::1', '2017-08-21', 16, '1503314712'),
('::1', '2017-08-21', 9, '1503314712'),
('::1', '2020-06-25', 12, '1593030732');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(39, 'Fashion', 'admin', 'fashion', 0),
(40, 'Kabar-kabari', 'admin', 'kabarkabari', 0),
(41, 'Tips & Trik', 'admin', 'tips--trik', 3);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Tidak'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(18, 'Tema 01', 'admin', 'Rizal Faizal', 'templates/tema01', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `kota`, `email`, `pesan`, `tanggal`, `dibaca`) VALUES
(2, 'Dea', 'Bandung', 'dea@yahoo.com', 'keren2 nih... sukses terus and makin maju ya...', '2009-02-25', 'Y'),
(15, 'Dedi', 'Jakarta', 'dedi_apr@yahoo.com', 'pelayanannya cepat dan responsif.', '2011-05-29', 'Y'),
(35, 'Farrah Qiu', 'Bengkulu', 'eva_adikara@yahoo.com', ' Terimakasih atas pelayanan TerasKreasi... kini dgn mudah sy punya website yg bagus.', '2012-08-30', 'Y'),
(43, 'ian s', 'Yogyakarta', 'ianinspira@gmail.com', 'Terimakasih kepada pak Rizal untuk Support yang memuaskan, tidak akan pernah menyesal jika order dis', '2012-09-10', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Ya','Tidak') COLLATE latin1_general_ci NOT NULL DEFAULT 'Tidak',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'Administrator', '401xdssh@gmail.com', '0853', '93rzl.jpg', 'admin', 'Tidak', 'guuuhclhf4v3muhhucdvv2bh72'),
('niken', 'feacdbb56a20dfbab94ed05dd16aa8b2', 'Niken Sulanjari', 'saya@yahoo.com', '', '67niken.jpg', 'user', 'Tidak', '08bdba24f01f56d1404fb0a0a66f144b');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, '5bi6b98a7r02hvh15dsog2vfo2', 84),
(2, '5bi6b98a7r02hvh15dsog2vfo2', 92),
(3, '5bi6b98a7r02hvh15dsog2vfo2', 77),
(4, '5bi6b98a7r02hvh15dsog2vfo2', 80),
(5, 'guuuhclhf4v3muhhucdvv2bh72', 57),
(6, 'guuuhclhf4v3muhhucdvv2bh72', 59),
(7, 'guuuhclhf4v3muhhucdvv2bh72', 77),
(8, 'guuuhclhf4v3muhhucdvv2bh72', 78),
(9, 'guuuhclhf4v3muhhucdvv2bh72', 79),
(10, 'guuuhclhf4v3muhhucdvv2bh72', 80),
(11, 'guuuhclhf4v3muhhucdvv2bh72', 81),
(12, 'guuuhclhf4v3muhhucdvv2bh72', 82),
(13, 'guuuhclhf4v3muhhucdvv2bh72', 83),
(14, 'guuuhclhf4v3muhhucdvv2bh72', 84),
(15, 'guuuhclhf4v3muhhucdvv2bh72', 85),
(16, 'guuuhclhf4v3muhhucdvv2bh72', 86),
(17, 'guuuhclhf4v3muhhucdvv2bh72', 87),
(18, 'guuuhclhf4v3muhhucdvv2bh72', 88),
(19, 'guuuhclhf4v3muhhucdvv2bh72', 89),
(20, 'guuuhclhf4v3muhhucdvv2bh72', 90),
(21, 'guuuhclhf4v3muhhucdvv2bh72', 91),
(22, 'guuuhclhf4v3muhhucdvv2bh72', 92),
(23, 'guuuhclhf4v3muhhucdvv2bh72', 93),
(24, 'guuuhclhf4v3muhhucdvv2bh72', 94),
(25, 'guuuhclhf4v3muhhucdvv2bh72', 95),
(26, 'guuuhclhf4v3muhhucdvv2bh72', 96),
(27, 'guuuhclhf4v3muhhucdvv2bh72', 97),
(28, 'guuuhclhf4v3muhhucdvv2bh72', 98),
(29, 'guuuhclhf4v3muhhucdvv2bh72', 99),
(30, 'guuuhclhf4v3muhhucdvv2bh72', 100),
(31, 'guuuhclhf4v3muhhucdvv2bh72', 101),
(32, 'guuuhclhf4v3muhhucdvv2bh72', 102),
(33, 'guuuhclhf4v3muhhucdvv2bh72', 103),
(34, 'guuuhclhf4v3muhhucdvv2bh72', 104);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `carabeli`
--
ALTER TABLE `carabeli`
  ADD PRIMARY KEY (`id_carabeli`);

--
-- Indexes for table `counter_ips`
--
ALTER TABLE `counter_ips`
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indexes for table `counter_values`
--
ALTER TABLE `counter_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `iklan_popup`
--
ALTER TABLE `iklan_popup`
  ADD PRIMARY KEY (`id_iklan_popup`);

--
-- Indexes for table `katajelek`
--
ALTER TABLE `katajelek`
  ADD PRIMARY KEY (`id_jelek`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategoriblog`
--
ALTER TABLE `kategoriblog`
  ADD PRIMARY KEY (`id_kategoriblog`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kustomer`
--
ALTER TABLE `kustomer`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `mod_bank`
--
ALTER TABLE `mod_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `mod_ym`
--
ALTER TABLE `mod_ym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
  ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id_peta`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id_sambutan`);

--
-- Indexes for table `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  ADD PRIMARY KEY (`id_sekilas`);

--
-- Indexes for table `shop_pengiriman`
--
ALTER TABLE `shop_pengiriman`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `carabeli`
--
ALTER TABLE `carabeli`
  MODIFY `id_carabeli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iklan_popup`
--
ALTER TABLE `iklan_popup`
  MODIFY `id_iklan_popup` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `katajelek`
--
ALTER TABLE `katajelek`
  MODIFY `id_jelek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kategoriblog`
--
ALTER TABLE `kategoriblog`
  MODIFY `id_kategoriblog` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `mod_bank`
--
ALTER TABLE `mod_bank`
  MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mod_ym`
--
ALTER TABLE `mod_ym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
  MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `peta`
--
ALTER TABLE `peta`
  MODIFY `id_peta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id_sambutan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  MODIFY `id_sekilas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `shop_pengiriman`
--
ALTER TABLE `shop_pengiriman`
  MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
