-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 09:18 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kreasiboutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(5) NOT NULL AUTO_INCREMENT,
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
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_kategoriblog`, `username`, `judul`, `sub_judul`, `judul_seo`, `headline`, `isi_blog`, `keterangan_gambar`, `youtube`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(28, 4, 'admin', 'Kejutan Koleksi Elegan', 'Trend Fashion', 'kejutan-koleksi-elegan', 'Y', '<p><strong>KreasiBoutique, </strong>Koleksi Hermes terbaru di Paris Fashion Week kental dengan kesan simpel, segar, dan mewah. Di tangan desainer barunya, Christophe Lemaire, koleksi Hermes mampu memukau ratusan tamu undangan yang hadir.<br /><br />Saat pergelaran, Lemaire mencetuskan ide dengan menyembunyikan para model dalam bilik-bilik ruangan yang hanya diterangi cahaya lampu redup. Setelah itu, model keluar dan berjalan mengitari kursi penonton, kemudian secara acak berhenti di hadapan mereka sembari berpose anggun, lalu kembali berlenggak lenggok di atas panggung.<br /><br />&ldquo;Saya ingin menciptakan sesuatu yang baru dan segar, menampilkan wajah Hermes yang lebih segar dan penuh kejutan,&rdquo; ucap Lemaire seperti dilansir WWD.<br /><br />Ide pergelaran itu terinspirasi dari pelancong yang mengembara ke tempat-tempat berbeda sambil mendengarkan alunan musik, lalu ada seorang wanita yang datang tiba-tiba, memesona dan cantik.<br /><br />Ibarat penonton, pemandangan seperti itulah yang tertangkap dalam imajinasi. Apa hanya pergelaran yang berbeda? Ternyata tidak.<br /><br />Kejutan juga datang dari koleksi busana, tas, serta aksesori yang dirancang Lemaire. Koleksi busana Hermes lebih bermain pada warna-warna putih, pastel, dan kombinasi warna terang seperti merah, oranye, kuning, dan hijau.<br /><br />Pergelaran dibuka dengan koleksi atasan berwarna putih yang dikombinasi dengan model celana harem dan jaket balon berukuran besar. Selanjutnya ditampilkan pula koleksi gaun tunik dan celana kulit berpotongan lebar dengan tiga strip garis di bagian betis. Ada juga rok dengan detail cutting dan siluet menyamping, serta atasan dari bahan kulit.<br /><br />Adapun yang menjadi inspirasi dari koleksi tersebut adalah gaun futuristik Yunani di era 1980-an ketika warna putih menjadi warna dominan yang berpadu dengan bahan kulit serta garis lipitan yang tegas memanjang. Sekilas, gaun tersebut terkesan klasik dan monoton. Tapi, perhatian penonton tak hentinya tertuju pada model-model yang berseliweran di depan dan sekeliling mereka.<br /><br />Hanya ada beberapa gaun yang direpresentasikan dengan ekspresi ceria oleh sang model. Oh ya, satu lagi yang menarik, kebanyakan dari mereka mengenakan ikat kepala dari bahan kulit tepat di batas garis poni lurus yang tertata rapi. Lemaire tidak hanya menunjukkan warna putih pada rancangannya.<br /><br />Dia kembali hadir membawa nuansa warna pelangi. Salah satunya koleksi two pieces yang penuh kombinasi dua warna, yakni merah dan biru berupa baju atasan dan rok mini berpadu dengan stocking warna senada.<br /><br />Selanjutnya, model memamerkan rok mini lipit, kemeja polos, dan jaket berkulit lembut yang bahannya diambil dari bulu domba.<br /><br />Diikuti oleh model yang mengenakan gaun pendek berwarna oranye berbahan linen dengan variasi sabuk kulit.Gaun ini cukup menarik perhatian karena menampilkan kesan yang unik. Pergelaran berlanjut pada model yang membawa koleksi setelan baju warna hijau berpadu dengan celana pendek warna karamel diikuti gaun cetak bergaya Amerika Indian yang memiliki kantung celana di bagian sisi kanan dan kiri pinggul.<br /><br />Kemudian,ada dua model yang bergantian tampil, salah satunya mengenakan suede shirt warna hijau dengan lengan tiga perempat dipadu rok berbahan kulit warna ungu terong. Sebagian besar koleksi Hermes tersebut coba memadukan antara gaya Yunani klasik dan gaya modern Amerika yang dibalut dengan permainan warnawarni yang selaras.<br /><br />Lemaire mengemas pergelaran Hermes dengan sentuhan yang &ldquo;berjiwa&rdquo; dan filosofi yang kuat. Tidak jauh berbeda dengan identitas Hermes sebelumnya, koleksi Spring/Summer 2012ini menampilkan kreasi yang lebih dinamis dan tentu saja elegan.</p>', '    gambar: istimewa', '', 'Kamis', '2013-04-11', '00:41:25', '31blog3.jpg', 85, 'fashion'),
(29, 4, 'admin', 'Perkembagan Busana Muslim', '', 'perkembagan-busana-muslim', 'Y', '<p><strong>KreasiBoutique, </strong>Pakaian busana muslim adalah seni yang datang dan menyebar sangat cepat karena kebanyakan orang suka memakai kain tersebut. Sekarang muslim semakin banyak perempuan dan anak perempuan yang datang dan membuat karir mereka di industri fashion. Seseorang harus menghargai upaya para perempuan Muslim dan anak perempuan yang meskipun begitu banyak rintangan yang datang dan membantu dengan cara yang indah banyak Muslim untuk tersebar di seluruh dunia.<br /> <br /> Banyak orang di dunia pada awalnya tidak menyadari begitu banyak desain yang indah dan kemampuan wanita-wanita. Namun hari-hari telah pergi dan sekarang busana muslim datang dengan ide-ide baru dan bekerja kreativitas karena kerja keras mereka dan sekarang orang-orang datang untuk mengetahui pikiran kreativitas para perempuan diremehkan dan gadis.<br /> <br /> Beberapa perancang mode terkenal mengambil pakaian busana muslim yang sangat serius dan mereka bekerja banyak dalam pengembangan busana muslim merancang. Banyak desainer terkenal dirancang muslim kain mode sekarang mudah tersedia di toko-toko online. Satu bisa membelinya dengan sangat mudah secara online atau di outlet mana mereka tersedia dengan diskon besar.<br /> <br /> <strong>Tantangan</strong><br /> <br /> Sebagai perempuan Muslim dan anak perempuan tidak banyak modis dibandingkan dengan wanita dari agama lain, tetapi perempuan Muslim dan anak perempuan yang keluar dari burkha dan beradaptasi dengan era mode saat ini sangat cepat. Sebagai perempuan Muslim dan perempuan yang sebelumnya tidak diizinkan untuk melakukan mode tapi sekarang hari muslim perempuan dan gadis datang dengan ide-ide sendiri mode dan menghasilkan tantangan baik terhadap perancang busana lain tetapi mereka masih menghadapi tantangan hal untuk perancang busana sesama mereka . perempuan Muslim dan perubahan pakaian laki-laki dari satu tempat ke tempat, di negara-negara modern yang bisa melihat wanita tidak mengenakan burkha tapi tidak bisa melihat mereka dalam gaun pendek baik. Dan di negara-negara Muslim khas seseorang dapat wanita menutupi wajah di atas burkha dan mengenakan gaun hitam.<br /> <br /> <strong>Keuntungan</strong><br /> <br /> pakaian muslim pada dasarnya sangat terkenal, warna desain dan bordir. Sejak berabad-abad busana muslim terkenal untuk pakaian, tetapi karena beberapa masalah sosial yang mereka tidak datang di seluruh dunia tapi sekarang situasi berubah karir sangat cepat dan sebagian besar wanita dan anak perempuan sekarang membuat dengan cara merancang yang masih seperti mimpi beberapa dekade kembali. Mode busana Muslim berkembang sangat cepat dalam hal kualitas dan gaya. pakaian muslim sekarang tersedia hampir di semua setiap warna dan gaya dengan polyester tradisional yang terbuat gaun. Busana muslim sekarang tersedia hampir di setiap warna dan dengan mode saat ini.<br /> <br /> Beberapa perancang mode terkenal mengambil pakaian busana muslim yang sangat serius dan mereka bekerja banyak dalam pengembangan busana muslim merancang. Banyak desainer terkenal dirancang muslim kain mode sekarang mudah tersedia di toko-toko online. Satu dapat membelinya sangat mudah online di diskon besar dan dapat menghemat waktu dan uang. Ada berbagai desain pakaian tersedia dari minimum untuk maksimal mencakup dalam busana busana muslim.</p>', '    ', '', 'Kamis', '2013-04-11', '02:34:16', '5busana_muslim1.jpeg', 4, 'fashion'),
(30, 4, 'admin', 'Asal-Usul T-Shirt ', '', 'asalusul-tshirt-', 'Y', '<p><strong>KreasiBoutique, </strong>T-Shirt atau Kaos oblong mungkin sudah menjadi pakaian yang biasa kita pakai sehari-hari dalam beraktifitas, bukan hanya untuk kegiatan santai, tapi apabila dipadu padankan dengan pakain yang lain kaos bisa dipakai pada acara resmi juga. Banyak alasan kenapa kita suka memakai kaos oblong; simpel, adem, gaul, dll&hellip;tapi ada yang tahu nggak sejarah awal mula adanya kaos oblong?<br /><br />T- Shirt atau kaos oblong pada awalnya digunakan sebagai pakaian dalam tentara Inggris dan Amerika pada abad 19 sampai awal abad 20. Asal muasal nama inggrisnya, T-shirt, tidak diketahui secara pasti. Teori yang paling umum diterima adalah nama T-shirt berasal dari bentuknya yang menyerupai huruf &ldquo;T&rdquo;, atau di karenakan pasukan militer sering menggunakan pakaian jenis ini sebagai &ldquo;training shirt&ldquo;<br /><br />T-shirt alias kaos polos ini mulai dipopulerkan sewaktu dipakai oleh Marlon Brando pada tahun 1947, yaitu ketika ia memerankan tokoh Stanley Kowalsky dalam pentas teater dengan lakon &ldquo;A Street Named Desire&rdquo; karya Tenesse William di Broadway, AS. T-shirt berwarna abu-abu yang dikenakannya begitu pas dan lekat di tubuh Brando, serta sesuai dengan karakter tokoh yang diperankannya. dan film Rebel Without A Cause (1995) yang dibintangi James Dean.<br /><br />Demam kaos oblong yang melumat seluruh benua Amerika dan Eropa pun terjadi sekita tahun 1961 itu. Apalagi ketika aktor James Dean mengenakan kaos oblong dalam film &ldquo;Rebel Without A Cause&rdquo;, sehingga eksistensi kaos oblong semakin kukuh dalam kehidupan di sana.<br /><br />Pada pertengahan tahun 50an, T-shirt sudah mulai menjadi bagian bagian dari dunia fashion. Namun baru pada tahun 60an ketika kaum hippies mulai merajai dunia, T-shirt benar-benar menjadi state of fashion itu sendiri. Sebagai sebuah simbol (lagi-lagi) anti kemapanan, para hippies ini menggunakan T-shirt/kaos sebagai salah satu simbolnya.<br /><br />Di Indonesia sendiri, konon, masuknya benda ini karena dibawa oleh orang-orang Belanda. Namun ketika itu perkembangannya tidak pesat, sebab benda ini mempunyai nilai gengsi tingkat tinggi, dan di Indonesia teknologi pemintalannya belum maju. Akibatnya benda ini termasuk barang mahal.<br /><br />Namun demikian, kaos oblong baru menampakkan perkembangan yang signifikan hingga merambah ke segenap pelosok pedesaan sekitar awal tahun 1970. Ketika itu wujudnya masih konvensional. Berwana putih, bahan katun-halus-tipis, melekat ketat di badan dan hanya untuk kaum pria. Beberapa merek yang terkenal waktu itu adalah Swan dan 77. Ada juga merek Cabe Rawit, Kembang Manggis, dan lain-lain. Dan tren kaos oblong rupa-rupanya direkam pula oleh Kartunis GM Sudarta melalui tokoh Om Pasikom dan kemenakannya dengan tajuk &ldquo;Generasi Kaos Oblong&rdquo;</p>', '      ', '', 'Kamis', '2013-04-11', '03:04:48', '17asal_usul_tshirt.jpeg', 10, 'fashion');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;