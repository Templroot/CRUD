-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2021 г., 16:18
-- Версия сервера: 5.7.30-0ubuntu0.16.04.1
-- Версия PHP: 7.0.33-0ubuntu0.16.04.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `881_20`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Accessories`
--

CREATE TABLE `Accessories` (
  `id_A` int(11) NOT NULL,
  `T_A_name` varchar(300) NOT NULL,
  `T_A_tip` int(5) DEFAULT NULL,
  `T_A_fun` varchar(4000) DEFAULT NULL,
  `T_A_price` decimal(10,2) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Accessories`
--

INSERT INTO `Accessories` (`id_A`, `T_A_name`, `T_A_tip`, `T_A_fun`, `T_A_price`, `image`) VALUES
(3, ' Ручка управления для плиты', 2, ' универсальная (белая), комплект 4 шт.', '471.00', 'https://cdn1.ozone.ru/s3/multimedia-f/wc1200/6034778499.jpg'),
(4, ' Чистящее средство Electrolux E6OCC104', 2, ' Чистящее средство Electrolux E6OCC104 предназначено для очистки внутренней поверхности духовок, рассчитанных на традиционный способ очистки. Физические свойства средства позволяют ему с легкостью справляться с жиром и пригоревшими остатками продуктов', '250.00', 'https://c.dns-shop.ru/thumb/st1/fit/wm/2000/3961/d9666c46e22930c8ecd53c6274feef91/331439ee0872b371bb854eb2340fc09ccd1c5661c1a6720f516ef2dd38623eba.jpg'),
(5, 'METALTEX Подставка на плиту', 0, 'Подставки на газовую плиту "Metaltex" предназначены для небольших кастрюль, ковшей, чайников диаметр дна которых меньше диаметра плитки. Такие подставки станут незаменимым помощником на вашей кухне ', '587.00', 'https://cdn1.ozone.ru/multimedia/wc1200/1011117628.jpg'),
(6, 'Адаптер для индукционной плиты', 1, 'Адаптер для индукционных плит позволяет использовать посуду из любого материала на индукционных плитах, главной функцией будет возможность готовить пищу в обычной посуде, поверхность которой для индукционных плит не подходит. Сюда можно отнести алюминиевые и эмалированные изделия.', '9990.00', 'https://cdn1.ozone.ru/s3/multimedia-j/wc1200/6061818139.jpg'),
(7, 'Газовый шланг UDI-GAS RUS/ FIX ', 0, 'Газовый шланг UDI-GAS RUS/ FIX используется для оснащения бытовых плит и другого оборудования, действующего на газу. Изделие производится из прочного металлического сплава. Данный материал отличается устойчивостью к деформациям, износостойкостью и длительным сроком службы. ', '399.00', 'https://cdn1.ozone.ru/s3/multimedia-q/wc1200/6036684278.jpg'),
(1, 'Жиклеры', 0, 'Жиклеры', '260.00', 'https://cdn1.ozone.ru/s3/multimedia-o/wc1200/6045802608.jpg'),
(2, 'Зажигалка газовая Irit IR-9053', 0, 'С помощью пьезозажигалки Irit IR-9053 удастся поджечь газовую горелку в духовке, на плите, в отопительном котле или водонагревательной колонке. Это нехитрое устройство позволит надолго забыть о спичках, потому что его можно заправлять множество раз.', '170.00', 'https://cdn1.ozone.ru/s3/multimedia-m/wc1200/6046528870.jpg'),
(8, 'Защитное покрытие из фольги для газовых плит ', 0, 'РАЗМЕР 50х60 см. Если вы считаете себя повелителем кухни и мастером по приготовлению различных вкусностей, то защитное покрытие для газовых плит станет вам верным помощником в любых кулинарных экспериментах. Специальная защитная фольга с удобным вырезом для конфорки значительно облегчит вам жизнь. ', '487.00', 'https://cdn1.ozone.ru/s3/multimedia-f/wc1200/6022023447.jpg'),
(9, 'защитные панели для плиты', 1, '•Увеличенная рабочая поверхность на кухне\n•Эстетичная защита плиты\n•Подставка под горячее\n•Подойдут в качестве разделочных досок\n•Закаленное стекло устойчиво к царапинам•	Можно мыть в посудомойке	', '3999.00', 'https://cdn1.ozone.ru/s3/multimedia-a/wc1200/6024473458.jpg'),
(10, 'Защитный экран на плиту и стены от брызг', 2, 'Защитный экран на плиту отличное решение от разбрызгивания масла при готовке. Спасает фартук кухни от брызг жира и пятен.', '190.00', 'https://cdn1.ozone.ru/s3/multimedia-b/wc1200/6060001427.jpg'),
(11, 'Набор для ухода Magic Power MP-21080', 2, 'Функциональный набор Magic Power MP-21080 предназначен для ухода за духовыми шкафами различного типа. Структура очистителя предполагает обработку преимущественно металлических поверхностей. В рабочий комплект входят чистящее средство и 2 салфетки из микрофибры. С помощью жидкого средства можно просто удалить пригоревший жир и трудноудаляемые пятна. ', '199.00', 'https://c.dns-shop.ru/thumb/st1/fit/wm/1608/1500/f5c1d88e2be2adbf538f73754b02cb0e/62ac47ec569fefd5582fab90ebf667bb3364664f542cd213a62bb60093f77f81.jpg'),
(12, 'Подставки на газовую плиту "Metaltex', 0, 'Подставки на газовую плиту "Metaltex" предназначены для небольших кастрюль, ковшей, чайников диаметр дна которых меньше диаметра плитки. Такие подставки станут незаменимым помощником на вашей кухне', '333.00', 'https://cdn1.ozone.ru/s3/multimedia-6/wc1200/6030697926.jpg'),
(13, 'Салфетка OneTwo O2NA019', 2, 'Салфетка OneTwo O2NA019, выполненная из микрофибры, предназначена для очищения различных поверхностей и придания блеска гладким поверхностям. Ее можно использовать для сухой и влажной уборки. Причем эффективность очищения будет высокой в обоих случаях. Благодаря особенностям структуры салфетка мягко удаляет загрязнения, не повреждая при этом поверхность. ', '99.00', 'https://c.dns-shop.ru/thumb/st1/fit/wm/2000/2000/bd1537354af1e6c109442463b76d2fca/fca7412e33122dc00694dccb7355ce2cd63480cb68871b3c07d6b5c7089335ae.jpg'),
(14, 'Скребок Topperr SC1 ', 2, 'Удобный бытовой скребок для стеклокерамики Topperr SC1 предназначен для очистки пригоревших загрязнений. ', '300.00', 'https://c.dns-shop.ru/thumb/st4/fit/500/500/e4f802605f88902ff95d7f274261b6d0/1ff996f1331b6620ba63b9a43cddb7ea8cd973f497fc72f2dce2c083068142e1.jpg'),
(15, 'СКРЕБОК ДЛЯ СТЕКЛОКЕРАМИ-ЧЕСКИХ ПЛИТ', 2, 'Материал: нержавеющая стальСтрана: Германия', '989.00', 'https://cdn1.ozone.ru/s3/multimedia-l/wc1200/6055005213.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Brand_V_Plit`
--

CREATE TABLE `Brand_V_Plit` (
  `Brand_id` int(5) NOT NULL,
  `Brand_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Brand_V_Plit`
--

INSERT INTO `Brand_V_Plit` (`Brand_id`, `Brand_name`) VALUES
(0, 'HANSA'),
(1, 'GEFEST'),
(2, 'GORENJ'),
(3, 'ЛЫСЬВ'),
(4, 'DARINA'),
(5, 'FLAMA'),
(6, 'BEKO'),
(7, 'Bosch');

-- --------------------------------------------------------

--
-- Структура таблицы `Color`
--

CREATE TABLE `Color` (
  `Color_id` int(5) NOT NULL,
  `Color_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Color`
--

INSERT INTO `Color` (`Color_id`, `Color_name`) VALUES
(0, 'белый'),
(1, 'серебристый'),
(2, 'желтый'),
(3, 'коричневый'),
(4, 'белый и черный'),
(5, 'черный'),
(6, 'Красный');

-- --------------------------------------------------------

--
-- Структура таблицы `DB_Dishwasher`
--

CREATE TABLE `DB_Dishwasher` (
  `id_E` int(11) NOT NULL,
  `Base_M_Brand` varchar(100) NOT NULL,
  `Base_M_Type` int(3) DEFAULT NULL,
  `Base_M_Drying_Type` int(4) DEFAULT NULL,
  `Base_M_Width` int(3) DEFAULT NULL,
  `Base_M_Kolvo` int(7) DEFAULT NULL,
  `Base_M_Water` int(7) DEFAULT NULL,
  `Base_M_price` decimal(10,2) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `DB_Dishwasher`
--

INSERT INTO `DB_Dishwasher` (`id_E`, `Base_M_Brand`, `Base_M_Type`, `Base_M_Drying_Type`, `Base_M_Width`, `Base_M_Kolvo`, `Base_M_Water`, `Base_M_price`, `image`) VALUES
(1, 'Beko DFS25W11W', 0, 0, 1, 1, 3, '25990.00', 'https://img.mvideo.ru/Pdb/20069479b.jpg'),
(2, 'Beko DFS28120X', 0, 0, 1, 3, 1, '26090.00', 'https://img.mvideo.ru/Pdb/20069479b.jpg'),
(3, 'Bosch SPS2HKW1DR', 2, 2, 0, 0, 0, '36990.00', 'https://i1.sndcdn.com/artworks-000556944858-79zn1s-t500x500.jpg'),
(4, 'Electrolux ESF9452LOX', 0, 0, 1, 0, 1, '39490.00', 'https://img.mvideo.ru/Pdb/20059578b.jpg'),
(5, 'Electrolux ESF9526LOW', 1, 0, 0, 4, 4, '36490.00', 'https://img.mvideo.ru/Pdb/20040406b.jpg'),
(6, 'Electrolux ESF9552LOX', 1, 1, 0, 4, 4, '42490.00', 'https://img.mvideo.ru/Pdb/20040406b.jpg'),
(7, 'Gorenje GS62010W', 1, 0, 0, 3, 4, '26790.00', 'https://img.mvideo.ru/Pdb/20036658b.jpg'),
(8, 'Hansa ZWM 416SEH', 0, 0, 1, 1, 1, '25990.00', 'https://img.mvideo.ru/Pdb/20045620b.jpg'),
(9, 'Hansa ZWM475WEH', 0, 0, 1, 1, 1, '25990.00', 'https://img.mvideo.ru/Pdb/20045619b.jpg'),
(10, 'Hansa ZWM616WH', 1, 0, 0, 3, 4, '25990.00', 'https://img.mvideo.ru/Pdb/20069152b.jpg'),
(11, 'HIBERG I681432MB', 1, 0, 0, 5, 6, '47600.00', 'https://avatars.mds.yandex.net/get-mpic/4362876/img_id4022095261638531144.jpeg/orig'),
(13, 'Midea MFD60S970X', 1, 0, 0, 5, 3, '41990.00', 'https://img.mvideo.ru/Pdb/20065096b.jpg'),
(14, 'Schaub Lorenz SLG SE4700 inox', 0, 0, 1, 1, 5, '26890.00', 'https://img.mvideo.ru/Pdb/4001663b.jpg'),
(15, 'Schaub Lorenz SLG SW4700white', 0, 0, 1, 1, 5, '25990.00', 'https://img.mvideo.ru/Pdb/4001664b.jpg'),
(17, 'ZANUSSI ZDF26004XA', 2, 1, 0, 4, 3, '36490.00', 'https://items.s1.citilink.ru/1050940_v01_b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `DB_Hose`
--

CREATE TABLE `DB_Hose` (
  `id_A` int(11) NOT NULL,
  `Base_N_Brand` varchar(100) NOT NULL,
  `Base_N_Type` int(2) DEFAULT NULL,
  `Base_N_Intend` varchar(100) DEFAULT NULL,
  `Base_N_Max_pressure` int(2) DEFAULT NULL,
  `Base_N_Max_t` int(5) DEFAULT NULL,
  `Base_N_Length` int(8) DEFAULT NULL,
  `Base_N_Price` decimal(10,2) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `DB_Hose`
--

INSERT INTO `DB_Hose` (`id_A`, `Base_N_Brand`, `Base_N_Type`, `Base_N_Intend`, `Base_N_Max_pressure`, `Base_N_Max_t`, `Base_N_Length`, `Base_N_Price`, `image`) VALUES
(1, 'ELECTROLUX E2WDA150B', 0, '0', 1, 2, 1, '790.00', 'https://www.nix.ru/images/ELECTROLUX-E2WDA150B-47155629259.png?good_id=471556&width=500&height=500&view_id=29259'),
(2, 'ELECTROLUX E2WDE400B', 0, '0', 1, 2, 6, '1190.00', 'https://elux-ru.ru/upload/iblock/c57/shlang_electrolux_e2wde400b.jpg'),
(3, 'Electrolux E2WIC150A', 1, '1', 1, 1, 1, '890.00', 'https://s1.electrolux-rus.ru/product/dlya_stiralnih_mashin/shlang-zalivnoj-electrolux-e2wic150a/9c7198031508836264/9c7198031508836264.png'),
(4, 'Electrolux E2WIH150A\nповышенной прочности', 1, '1', 1, 2, 1, '990.00', 'https://www.electrolux.ru/remote.jpg.ashx?urlb64=aHR0cHM6Ly9zZXJ2aWNlcy5lbGVjdHJvbHV4LW1lZGlhbGlicmFyeS5jb20vMTE4ZWQ0YzBlZTY1NDZmNGE3Njg0YzdmZWY4Yzk4NWFOclptWWtNODYxZDFmL3ZpZXcvV1NfUE4vUFNFRVdNMTkwUEUwMDAwTC5wbmc&hmac=ATLVEuH-Hfo&width=1600&quality=70&format=png&mode=crop'),
(5, 'ELECTROLUX E2WII150A', 1, '1', 1, 1, 1, '690.00', 'https://www.electrolux.ru/remote.jpg.ashx?urlb64=aHR0cHM6Ly9zZXJ2aWNlcy5lbGVjdHJvbHV4LW1lZGlhbGlicmFyeS5jb20vMTE4ZWQ0YzBlZTY1NDZmNGE3Njg0YzdmZWY4Yzk4NWFOclptWWtNODYxZDFmL3ZpZXcvV1NfUE4vUFNFRVdNMTkwUEUwMDAwRy5wbmc&hmac=CyJtixt0r44&width=1600&quality=70&format=png&mode=crop'),
(6, 'ELECTROLUX E2WII250A', 1, '1', 1, 1, 2, '890.00', 'https://www.electrolux.ru/remote.jpg.ashx?urlb64=aHR0cHM6Ly9zZXJ2aWNlcy5lbGVjdHJvbHV4LW1lZGlhbGlicmFyeS5jb20vMTE4ZWQ0YzBlZTY1NDZmNGE3Njg0YzdmZWY4Yzk4NWFOclptWWtNODYxZDFmL3ZpZXcvV1NfUE4vUFNFRVdNMTkwUEUwMDAwSC5wbmc&hmac=3TFj4OulJ4o&width=1600&quality=70&format=png&mode=crop'),
(7, 'ELECTROLUX E2WII350A', 1, '1', 1, 1, 1, '1190.00', 'https://www.electrolux.ru/remote.jpg.ashx?urlb64=aHR0cHM6Ly9zZXJ2aWNlcy5lbGVjdHJvbHV4LW1lZGlhbGlicmFyeS5jb20vMTE4ZWQ0YzBlZTY1NDZmNGE3Njg0YzdmZWY4Yzk4NWFOclptWWtNODYxZDFmL3ZpZXcvV1NfUE4vUFNFRVdNMTkwUEUwMDAwSS5wbmc&hmac=3QuwVGRyLJI&width=1600&quality=70&format=png&mode=crop'),
(8, 'Electrolux для СМ и ПММ', 0, '0', 1, 1, 0, '790.00', 'https://www.electrolux.ru/remote.jpg.ashx?preset=16%3A9-2880&origin=T1&urlb64=aHR0cHM6Ly9zZXJ2aWNlcy5lbGVjdHJvbHV4LW1lZGlhbGlicmFyeS5jb20vMTE4ZWQ0YzBlZTY1NDZmNGE3Njg0YzdmZWY4Yzk4NWFOclptWWtNODYxZDFmL3ZpZXcvV1NfUE4vUFNFRVdNMTkwUEUwMDAwRC5wbmc&hmac=Rd9NTmxrNXw'),
(9, 'Electrolux повышенной прочности', 1, '1', 1, 0, 2, '2390.00', 'https://kinza.studio/image/cache/catalog/import_files/02/024cd7ad452711e99a3cd43d7eef32cd_024cd7ae452711e99a3cd43d7eef32cd-650x650.jpg'),
(10, 'Electrolux с системой безопасности', 1, '1', 1, 0, 1, '3590.00', 'https://www.electrolux.ru/remote.jpg.ashx?preset=16%3a9-2880&origin=T1&urlb64=aHR0cHM6Ly9zZXJ2aWNlcy5lbGVjdHJvbHV4LW1lZGlhbGlicmFyeS5jb20vMTE4ZWQ0YzBlZTY1NDZmNGE3Njg0YzdmZWY4Yzk4NWFOclptWWtNODYxZDFmL3ZpZXcvV1NfUE4vUFNFRVdNMTkwUEUwMDAwRi5wbmc&hmac=L7mJwDrzPAU'),
(11, 'MAGIC POWER', 1, '1', 1, 1, 5, '346.00', 'https://avatars.mds.yandex.net/get-mpic/1522540/img_id8131000976107459822.jpeg/orig'),
(12, 'Акссесуар MAGIC POWER', 1, '1', 1, 1, 3, '301.00', 'https://static.onlinetrade.ru/img/items/b/super_salfetka_iz_mikrofibry_s_leskoy_magic_power_mikrofibrovaya_1_sht_922418_1.jpg'),
(13, 'Запчать MAGIC POWER', 0, '0', 0, 0, 3, '256.00', 'https://cdn1.ozone.ru/s3/multimedia-w/wc1200/6016275200.jpg'),
(14, 'Трубка MAGIC POWER', 0, '0', 0, 0, 5, '301.00', 'https://chhmt.ru/dlyadomadachiisistem/poliva/universalnye/1360_95bd8c7118d3b68600651f4630d86b64_shlang-magic-garden-ultra-hose-100-ft-30m-pf.jpg'),
(15, 'Шланг MAGIC POWER', 0, '0', 0, 0, 3, '333.00', 'https://static.onlinetrade.ru/img/items/b/shlang_magic_power_slivnoy_santekhnicheskiy_dlya_stiralnykh_mashin_3_m._938022_1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `DB_Washer`
--

CREATE TABLE `DB_Washer` (
  `id_W` int(11) NOT NULL,
  `Base_D_Brand` varchar(100) NOT NULL,
  `Base_D_Type` int(2) DEFAULT NULL,
  `Base_D_Drying_Function` int(2) DEFAULT NULL,
  `Base_D_Width` int(5) DEFAULT NULL,
  `Base_D_Max_Load` int(7) DEFAULT NULL,
  `Base_D_Speed` int(7) DEFAULT NULL,
  `Base_D_price` decimal(10,2) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `DB_Washer`
--

INSERT INTO `DB_Washer` (`id_W`, `Base_D_Brand`, `Base_D_Type`, `Base_D_Drying_Function`, `Base_D_Width`, `Base_D_Max_Load`, `Base_D_Speed`, `Base_D_price`, `image`) VALUES
(1, 'Bosch WLG 2426 W', 0, 1, 0, 6, 3, '27990.00', 'https://img.mvideo.ru/Pdb/20026895b.jpg'),
(2, 'Electrolux EWT0862IFW', 1, 1, 1, 1, 0, '31990.00', 'https://img.mvideo.ru/Pdb/20041675b.jpg'),
(3, 'Electrolux PerfectCare 600 EW6S4R06W', 0, 1, 0, 1, 3, '23990.00', 'https://otziv-otziv.ru/assets/cache/images/product/17/170/electrolux-perfectcare-600-ew6s4r06w-212820707-600x600-c7b.jpg'),
(4, 'Gorenje WT 62113', 1, 1, 1, 1, 2, '29490.00', 'https://img.mvideo.ru/Pdb/20068233b.jpg'),
(5, 'Haier HW70-12829A', 0, 1, 2, 2, 3, '34990.00', 'https://img.mvideo.ru/Pdb/20064638b.jpg'),
(8, 'Korting KWMT0860', 1, 1, 1, 1, 0, '42990.00', 'https://img.mvideo.ru/Pdb/20042547b.jpg'),
(9, 'LG F-1096ND3', 0, 1, 0, 1, 1, '23490.00', 'https://img.mvideo.ru/Pdb/20066379b.jpg'),
(10, 'Midea MWM8123i- Crown', 0, 1, 0, 4, 3, '27990.00', 'https://img.mvideo.ru/Pdb/4002129b.jpg'),
(11, 'Samsung WW80R42LHDW', 0, 1, 0, 4, 3, '28990.00', 'https://static.eldorado.ru/photos/71/715/188/21/new_71518821_l_1562583061.jpeg/resize/700x525/'),
(13, 'Weissgauff WM- 40275 TD', 1, 1, 1, 3, 3, '27990.00', 'https://img.mvideo.ru/Pdb/4061980b.jpg'),
(14, 'Weissgauff WM- 4126 D', 0, 1, 0, 1, 1, '20990.00', 'https://img.mvideo.ru/Pdb/4061982b.jpg'),
(15, 'Weissgauff WMD -4748 DC Inverter Steam', 0, 0, 2, 4, 4, '39990.00', 'https://img.mvideo.ru/Pdb/4061992b.jpg'),
(16, 'Weissgauff WMD -6150 DC Inverter Steam', 0, 0, 2, 5, 6, '42990.00', 'https://img.mvideo.ru/Pdb/4061992b.jpg'),
(17, 'Weissgauff WMD -6160 D', 0, 0, 2, 5, 5, '36990.00', 'https://avatars.mds.yandex.net/get-mpic/1865543/img_id3073050681422524256.jpeg/orig'),
(18, 'Zanussi ZWY51024CI', 1, 1, 1, 0, 1, '31990.00', 'https://img.mvideo.ru/Pdb/4002167b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Drying_Function`
--

CREATE TABLE `Drying_Function` (
  `Drying_Function_id` int(2) NOT NULL,
  `Drying_Function_name` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Drying_Function`
--

INSERT INTO `Drying_Function` (`Drying_Function_id`, `Drying_Function_name`) VALUES
(0, 'Да'),
(1, 'Нет');

-- --------------------------------------------------------

--
-- Структура таблицы `EKlass`
--

CREATE TABLE `EKlass` (
  `EKlass_id` int(5) NOT NULL,
  `EKlass_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `EKlass`
--

INSERT INTO `EKlass` (`EKlass_id`, `EKlass_name`) VALUES
(0, 'A'),
(1, 'B');

-- --------------------------------------------------------

--
-- Структура таблицы `E_Plit`
--

CREATE TABLE `E_Plit` (
  `id_E` int(11) NOT NULL,
  `T_E_Name` varchar(30) NOT NULL,
  `T_E_Proizvod` int(5) DEFAULT NULL,
  `T_E_size` int(5) DEFAULT NULL,
  `T_E_Color` int(5) DEFAULT NULL,
  `T_E_Fun` varchar(1000) DEFAULT NULL,
  `T_E_Kol_vo_Komf` int(5) DEFAULT NULL,
  `T_E_Klass` int(5) DEFAULT NULL,
  `T_E_prise` decimal(10,2) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `E_Plit`
--

INSERT INTO `E_Plit` (`id_E`, `T_E_Name`, `T_E_Proizvod`, `T_E_size`, `T_E_Color`, `T_E_Fun`, `T_E_Kol_vo_Komf`, `T_E_Klass`, `T_E_prise`, `image`) VALUES
(1, 'DARINA S EM 521 404 W1', 0, 0, 0, 'Потребляемая мощность — 3,0 кВт, Установленная мощность — 4,0 кВт', 0, 0, '8390.00', 'https://img.mvideo.ru/Pdb/4001640b.jpg'),
(2, 'DARINA S EM 533 404 W', 4, 0, 0, 'Потребляемая мощность - 3,0 кВт, Установленная мощность - 4,0 кВт.', 2, 0, '8390.00', 'https://img.mvideo.ru/Pdb/4001632b.jpg'),
(3, 'DARINA S EM 78B 404 E', 4, 10, 5, 'Вид и давление газа — Природный (метан) 1300 Па', 0, 1, '12490.00', 'https://img.mvideo.ru/Pdb/4001640b.jpg'),
(4, 'GEFEST ЭП Н Д 5140 -0001', 1, 2, 3, 'Ножки регулировочне, Штампованные направляющие', 0, 1, '30520.00', 'https://img.mvideo.ru/Pdb/20045175b.jpg'),
(5, 'GORENJE E71010W+', 1, 11, 0, 'Рецепты на дверях духовки Ножки регулировочне', 0, 0, '19490.00', 'https://img.mvideo.ru/Pdb/1100026555134b.jpg'),
(6, 'GORENJE E78CV-21W+', 2, 11, 0, 'Потребляемая мощность — 3,0 кВт, Установленная мощность — 4,0 кВт.', 1, 1, '7830.00', 'https://img.mvideo.ru/Pdb/1100023527429b.jpg'),
(7, 'GORENJE EC+UTF', 2, 2, 0, 'Индикаторы остаточного тепла', 0, 0, '28490.00', 'https://img.mvideo.ru/Pdb/1100026555292b.jpg'),
(8, 'GORENJE EC5121WG-B', 2, 2, 0, 'Индикаторы остаточного тепла', 0, 0, '24490.00', 'https://img.mvideo.ru/Pdb/1100023527437b.jpg'),
(9, 'GORENJE EC512FDG-B', 2, 2, 5, 'Индикаторы остаточного тепла', 0, 0, '24490.00', 'https://img.mvideo.ru/Pdb/20066453b.jpg'),
(10, 'GORENJE EC51676HG-K', 2, 2, 0, 'Индикаторы остаточного тепла', 0, 0, '28490.00', 'https://static.eldorado.ru/photos/71/715/397/44/new_71539744_l_1583915252.jpeg/resize/380x240/'),
(11, 'HANSA FCCW530001', 0, 0, 0, 'Рецепты на дверях духовки.Индикаторы остаточного тепла', 0, 0, '18810.00', 'https://img.mvideo.ru/Pdb/1100027113076b.jpg'),
(12, 'HANSA FHHYW5300-01', 0, 0, 4, 'Рецепты на дверях духовки.Индикаторы остаточного тепла ', 0, 0, '18810.00', 'https://holod.ru/pics/clean/medium/19/553519_0.jpg'),
(13, 'ЛЫСЬВ ЭПС 301 МС', 3, 9, 5, 'Гарантия 12 мес.Страна производитель Россия', 3, 0, '14490.00', 'https://img.mvideo.ru/Pdb/1100023959957b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Gaz_Plit`
--

CREATE TABLE `Gaz_Plit` (
  `id_G` int(11) NOT NULL,
  `T_Gaz_Name` varchar(30) NOT NULL,
  `T_Gaz_Proizvod` int(5) DEFAULT NULL,
  `T_Gaz_size` int(5) DEFAULT NULL,
  `T_Gaz_Color` int(5) DEFAULT NULL,
  `T_Gaz_Fun` varchar(1000) DEFAULT NULL,
  `T_Gaz_Kol_vo_Komf` int(5) DEFAULT NULL,
  `T_Gaz_Tip` int(5) DEFAULT NULL,
  `T_Gaz_prise` decimal(10,2) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Gaz_Plit`
--

INSERT INTO `Gaz_Plit` (`id_G`, `T_Gaz_Name`, `T_Gaz_Proizvod`, `T_Gaz_size`, `T_Gaz_Color`, `T_Gaz_Fun`, `T_Gaz_Kol_vo_Komf`, `T_Gaz_Tip`, `T_Gaz_prise`, `image`) VALUES
(1, 'BEKO FSGT62110GWIJ', 0, 0, 0, 'Регулируемые ножки. Комплект дополнительных форсунок', 0, 0, '23490.00', 'https://img.mvideo.ru/Pdb/1100025653245b.jpg'),
(2, 'BEKO FSHYO10G9', 6, 8, 2, 'Вид и давление газа — Природный (метан) 1300 Па', 0, 1, '26890.00', 'https://static.eldorado.ru/photos/71/715/626/64/new_71562664_l_1599041395.jpeg/resize/700x525/'),
(3, 'Bosch HGA 128 D 20 R', 7, 1, 0, 'Страна-производитель:Турция', 0, 1, '31840.00', 'https://img.mvideo.ru/Pdb/20055667b1.jpg'),
(4, 'DARINA 1B КM 441 301 W', 4, 3, 5, 'Регулируемые опоры. Жиклеры под сжиженный газ. Крышка стеклянная', 0, 0, '11740.00', 'https://img.mvideo.ru/Pdb/20031593b.jpg'),
(5, 'Flama AVG 1401 W ', 5, 7, 0, ' Страна-производитель:Россия', 0, 0, '4400.00', 'https://img.mvideo.ru/Pdb/1100001325390b.jpg'),
(6, 'FLAMA CG 3202 W', 5, 6, 0, 'Вид и давление газа — Природный (метан) 1300 Па', 2, 0, '7220.00', 'https://static.eldorado.ru/photos/71/711/698/54/new_71169854_l_1459332546.jpeg/resize/700x525/'),
(7, 'GEFEST ПГ 3200-08 К86', 1, 6, 3, 'Страна-производитель:Беларусь', 0, 0, '9999.00', 'https://img.mvideo.ru/Pdb/20044211b.jpg'),
(8, 'GEFEST ПГ 326-5864-574', 1, 6, 4, 'Мощность вехнего ТЭНа: 1 кВт, Мощность нижнего ТЭНа: 1.4 кВт ', 0, 1, '38140.00', 'https://static.eldorado.ru/photos/71/712/481/26/new_71248126_l_1508333710.jpeg/resize/700x525/'),
(9, 'GEFEST ПГЭ 6102-02', 1, 1, 3, 'Ножки регулировочные. Проволочные направляющие. Терморегулятор (термостат). Электророзжиг горелок, кнопка розжига на панели', 0, 0, '19990.00', 'https://static.eldorado.ru/photos/71/711/609/27/new_71160927_l_1451322100.jpeg/resize/700x525/'),
(10, 'GORENJ K5241SH', 2, 5, 0, 'классический нагрев, классический нагрев + работа вентилятора, большой электрический гриль, большой гриль ', 0, 0, '28520.00', 'https://img.mvideo.ru/Pdb/20063070b20.jpg'),
(11, 'GORENJ K896H+', 2, 5, 2, 'Работа вентилятора, большой электрический гриль, большой гриль', 3, 1, '30520.00', 'https://img.mvideo.ru/Pdb/20042635b.jpg'),
(12, 'HANSA FCMW53000', 0, 0, 0, 'Верхний нагревательный элемент (900 В),Нижний нагревательный элемент (1300 В)', 0, 0, '17799.00', 'https://img.mvideo.ru/Pdb/4001573b.jpg'),
(13, 'ZANUSSI ZCK9540G1W', 6, 1, 0, 'Мощность вехнего ТЭНа: 1 кВт', 3, 1, '26370.00', 'https://img.mvideo.ru/Pdb/20034754b.jpg'),
(14, 'ЛЫСЬВ ЭГ 1/3г14 МС-2у', 3, 0, 2, 'Мощность вехнего ТЭНа: 1 кВт, Мощность нижнего ТЭНа: 1.4 кВт, Мощность ТЭН-гриля: 1.6 кВт', 1, 0, '13990.00', 'https://static.eldorado.ru/photos/74/new_74122384_l_1575997490.jpeg/resize/700x525/');

-- --------------------------------------------------------

--
-- Структура таблицы `Intend`
--

CREATE TABLE `Intend` (
  `Intend_id` varchar(100) NOT NULL,
  `Intend_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Intend`
--

INSERT INTO `Intend` (`Intend_id`, `Intend_name`) VALUES
('0', 'подключение\nстиральной машины\nк системе канализации'),
('1', 'подключение\nстиральной машины\nк водопроводу');

-- --------------------------------------------------------

--
-- Структура таблицы `Kolvo`
--

CREATE TABLE `Kolvo` (
  `Kolvo_id` int(7) NOT NULL,
  `Kolvo_name` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Kolvo`
--

INSERT INTO `Kolvo` (`Kolvo_id`, `Kolvo_name`) VALUES
(0, 9),
(1, 10),
(2, 11),
(3, 12),
(4, 13),
(5, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `Kol_Vo_Komforok`
--

CREATE TABLE `Kol_Vo_Komforok` (
  `Komfork_id` int(5) NOT NULL,
  `Komfork_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Kol_Vo_Komforok`
--

INSERT INTO `Kol_Vo_Komforok` (`Komfork_id`, `Komfork_name`) VALUES
(0, '4'),
(1, '3'),
(2, '2'),
(3, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `Length`
--

CREATE TABLE `Length` (
  `Length_id` int(8) NOT NULL,
  `Length_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Length`
--

INSERT INTO `Length` (`Length_id`, `Length_name`) VALUES
(0, '0.5-2'),
(1, '1.5'),
(2, '2.5'),
(3, '3'),
(4, 'до 3.5'),
(5, '4'),
(6, '1.2-4'),
(7, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `Max_Load`
--

CREATE TABLE `Max_Load` (
  `Max_Load_id` int(7) NOT NULL,
  `Max_Load_name` decimal(10,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Max_Load`
--

INSERT INTO `Max_Load` (`Max_Load_id`, `Max_Load_name`) VALUES
(0, '5.5'),
(1, '6.0'),
(2, '7.0'),
(3, '7.5'),
(4, '8.0'),
(5, '10.0'),
(6, '5.0');

-- --------------------------------------------------------

--
-- Структура таблицы `Max_pressure`
--

CREATE TABLE `Max_pressure` (
  `Max_pressure_id` int(2) NOT NULL,
  `Max_pressure_name` decimal(10,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Max_pressure`
--

INSERT INTO `Max_pressure` (`Max_pressure_id`, `Max_pressure_name`) VALUES
(0, '20.0'),
(1, '0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `Max_t`
--

CREATE TABLE `Max_t` (
  `Max_t_id` int(5) NOT NULL,
  `Max_t_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Max_t`
--

INSERT INTO `Max_t` (`Max_t_id`, `Max_t_name`) VALUES
(0, 'до +100'),
(1, 'до +25'),
(2, 'до +90');

-- --------------------------------------------------------

--
-- Структура таблицы `MR_Base_Acs`
--

CREATE TABLE `MR_Base_Acs` (
  `id` int(11) NOT NULL,
  `MR_Base_Acs_name` varchar(200) NOT NULL,
  `MR_Base_Acs_userr` int(5) DEFAULT NULL,
  `MR_Base_Acs_disc` varchar(1000) DEFAULT NULL,
  `MR_Base_Acs_price` decimal(10,2) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `MR_Base_Acs`
--

INSERT INTO `MR_Base_Acs` (`id`, `MR_Base_Acs_name`, `MR_Base_Acs_userr`, `MR_Base_Acs_disc`, `MR_Base_Acs_price`, `image`) VALUES
(2, 'Аккумулятор холода Ecos IP-150 (150мл) 5112', 0, 'Предназначен для хранения и транспортировки скоропортящихся продуктов, охлаждению напитков в изотермических контейнерах, термобоксах, термосумках. Для любого поддержания низкой температуры. Герметично упакован, не токсичен.Материал: Полимерные материалы, теплоемкий водный раствор.', '1050.00', 'https://holod.ru/pics/clean/medium/56/673256_0.jpg'),
(3, 'Аккумулятор холода Ezetil Ice Akku 2 x 200 gr', 1, 'Аккумуляторs холода (2 штуки по 200 г каждый) применяются для поддержания температурного режима в течение 12 часов. Перед использованием необходимо поместить аккумулятор холода в морозильную камеру до полного замерзания. Для многоразового использования.\r\n\r\n', '299.00', 'https://holod.ru/pics/clean/medium/34/615934_0.jpg'),
(4, 'Антибактериальный коврик Magic Power MP-612', 1, 'Используется в контейнерах для хранения овощей и фруктов\r\nОбеспечивает свежесть продуктов в течение длительного времени, благодаря циркуляции воздуха между продуктами и поверхностями холодильника. Ячеистая структура коврика предотвращает размножение бактерий и образование плесени.\r\n\r\n', '190.00', 'https://holod.ru/pics/clean/medium/13/416713_0.jpg'),
(5, 'Вакуумные пакеты NEFF Z13CX62X0', 0, 'Пакеты для вакуумирования могут быть использованы для хранения продуктов при низких температурах, а также для приготовления продуктов. Они подходят, чтобы дольше сохранить продукты, чтобы замариновать или подготовить для приготовления под вакуумом. В наборе 100 вакуумных пакетов.', '9990.00', 'https://static.onlinetrade.ru/img/items/m/neff_z13cx62x0_912083_1.jpg'),
(6, 'Вакуумные пакеты NEFF Z13CX64X0', 1, 'Пакеты для вакуумирования могут быть использованы для хранения продуктов при низких температурах, а также для приготовления продуктов. Они подходят, чтобы дольше сохранить продукты, чтобы замариновать или подготовить для приготовления под вакуумом. В наборе 100 шт.', '9990.00', 'https://static.onlinetrade.ru/img/items/m/neff_z13cx64x0_912084_1.jpg'),
(7, 'Декоративная наклейка Topperr 7003', 1, 'Декоративная цветная наклейка на холодильник из винила «Я на диете». Композиция состоит из двух элементов – молнии и надписи. ', '387.00', 'https://cdn3.static1-sima-land.com/items/1402199/0/400.jpg?v=0'),
(8, 'Корзина Liebherr для морозильных ларей (7113557)', 0, 'Дополнительная корзина для морозильных ларей. Благодаря установке дополнительных корзин облегчается сортировка и обеспечивается более простой доступ к замороженным продуктам.', '2329.00', 'https://images.ru.prom.st/341147809_w600_h600_341147809.jpg'),
(9, 'Лоток Liebherr для замораживания (7426080)', 5, 'Поднос позволяет замораживать разложенные отдельно фрукты, ягоды и зелень. Так продукты не смерзаются, сохраняют форму и могут быть упакованы в вакуум или разделены на порции. ', '709.00', 'https://holod.ru/pics/clean/medium/94/669994_0.jpg'),
(10, 'Масленка Liebherr 7420306', 2, 'Практичная маслёнка была разработана для удобного использования с помощью одной руки. Она легко снимается и открывается, благодаря продуманным габаритам может вместить сливочное масло различных размеров.Маслёнка устойчива к падениям и мойке в посудомоечной машине', '1359.00', 'https://holod.ru/pics/clean/medium/11/563111_0.jpg'),
(11, 'Поглотитель запаха Topperr 3112', 1, 'Длительное хранение пищевых продуктов в холодильнике вызывает появление неприятного запаха. Благодаря свой форме, гелевые шарики позволяют свободно циркулировать воздуху, тем самым ускоряя процесс поглощения неприятного запаха вдвое по сравнению с другими поглотителями.\r\n\r\n', '194.00', 'https://holod.ru/pics/clean/medium/25/458525_0.jpg'),
(12, 'Поднос для замораживания Liebherr (7431419)', 0, 'Поднос позволяет замораживать разложенные отдельно фрукты, ягоды и зелень. Так продукты не смерзаются, сохраняют форму и потом могут быть упакованы в вакуум или разделены на порции.', '709.00', 'https://www.xorta.com.ua/img/catalog/16149.jpg'),
(13, 'Подставка для яиц на 12 шт Bosch 00654282', 1, 'Оптимальна для размещения в полке дверцы холодильной камеры. Вмещает до 12 яиц\r\nДлина:280 - Ширина:99 - Высота - 25 мм\r\n', '540.00', 'https://holod.ru/pics/clean/medium/30/527130_0.jpg'),
(14, 'Полка для бутылок подвесная универсальная, для холодильников ELECTROLUX E4RHBH01', 0, 'Несмотря на то, что высота его составляет лишь десять сантиметров, в него можно поместить до трех 1,5-литровых бутылок или до шести банок, что позволяет сберечь место, а также организовать и оптимизировать внутреннее пространство холодильника.', '3190.00', 'https://cache3.youla.io/files/images/720_720_out/5b/df/5bdf1470074b3e60393b27b8.jpg'),
(15, 'Специальный очиститель для холодильников Bosch (311910), 500 мл', 0, 'Специальное средство для интенсивной очистки холодильников и морозильников\r\nПодходит для внутренних и внешних поверхностей прибора. Эффективно и быстро удаляет загрязнения, устраняет неприятные запахи и обеспечивает приятную свежесть.\r\n', '490.00', 'data:image/jpeg;base64,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'),
(16, 'Чистящее средство для холодильников Magic Power MP-011', 0, 'Чистящее средство для ухода за холодильниками применяется для очистки внутреннегои внешнего пространства холодильника. Предотвращает образование плесени, что позволяет хранить пищу в наилучших гигиенических условиях, созданных благодаря данному средству.', '195.00', 'https://sun9-44.userapi.com/impg/sdLLsQCwoA618vAFa35SB9hpvtcJm8DQU1bOoQ/ixAGEFQxdpk.jpg?size=0x400&crop=0.2,0.008,0.651,0.976&quality=95&sign=2dd32a060eb5547b3d4a138588ad7665');

-- --------------------------------------------------------

--
-- Структура таблицы `MR_Base_Brand`
--

CREATE TABLE `MR_Base_Brand` (
  `MR_Base_Brand_id` int(5) NOT NULL,
  `MR_Base_Brand_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `MR_Base_Brand`
--

INSERT INTO `MR_Base_Brand` (`MR_Base_Brand_id`, `MR_Base_Brand_name`) VALUES
(0, 'Liebherr'),
(1, 'Бирюса'),
(2, 'LERAN'),
(3, 'Атлант'),
(4, 'Gorenje'),
(5, 'Midea'),
(6, 'Haier');

-- --------------------------------------------------------

--
-- Структура таблицы `MR_Base_Defrosting`
--

CREATE TABLE `MR_Base_Defrosting` (
  `MR_Base_Defrosting_id` int(5) NOT NULL,
  `MR_Base_Defrosting_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `MR_Base_Defrosting`
--

INSERT INTO `MR_Base_Defrosting` (`MR_Base_Defrosting_id`, `MR_Base_Defrosting_name`) VALUES
(0, 'No Frost'),
(1, 'Ручное');

-- --------------------------------------------------------

--
-- Структура таблицы `MR_Base_Moroz`
--

CREATE TABLE `MR_Base_Moroz` (
  `id` int(11) NOT NULL,
  `MR_Base_M_name` varchar(100) NOT NULL,
  `MR_Base_M_Brand` int(5) DEFAULT NULL,
  `MR_Base_M_Type` int(5) DEFAULT NULL,
  `MR_Base_M_Volume` varchar(30) DEFAULT NULL,
  `MR_Base_M_Defrosting` int(5) DEFAULT NULL,
  `MR_Base_M_Energy` varchar(25) DEFAULT NULL,
  `MR_Base_M_Size` varchar(25) DEFAULT NULL,
  `MR_Base_M_price` decimal(10,2) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `MR_Base_Moroz`
--

INSERT INTO `MR_Base_Moroz` (`id`, `MR_Base_M_name`, `MR_Base_M_Brand`, `MR_Base_M_Type`, `MR_Base_M_Volume`, `MR_Base_M_Defrosting`, `MR_Base_M_Energy`, `MR_Base_M_Size`, `MR_Base_M_price`, `image`) VALUES
(1, 'Морозильная камера Haier HF-93QJW', 0, 0, '135', 0, '123', '84 – 50 – 55 см', '12321.00', 'https://img.mvideo.ru/Pdb/20053934b.jpg'),
(2, 'Морозильная камера Haier HF-82WAA', 0, 0, '83', 0, '175', '84 – 50 – 55 см', '17990.00', 'https://img.mvideo.ru/Pdb/20038672b.jpg'),
(3, 'Морозильная камера Leran FSF 250 W', 0, 0, '251', 0, '285', '150 – 66 – 62 см', '21990.00', 'https://static.onlinetrade.ru/img/items/m/leran_fsf_182_w_771317_2.jpg'),
(4, 'Морозильник Gorenje FN6191CX', 4, 0, '243', 0, '302', '185 – 60 – 64 см', '39990.00', 'https://avatars.mds.yandex.net/get-mpic/1620389/img_id103837624076004897/9hq'),
(5, 'Морозильник Gorenje FN6192PX', 0, 0, '243', 0, '237', '185 – 60 – 64 см', '54990.00', 'https://img.mvideo.ru/Pdb/20035475b.jpg'),
(6, 'Морозильник Gorenje FN61CSY2W', 4, 0, '243', 0, '302', '185 – 60 – 64 см', '36990.00', 'https://static.onlinetrade.ru/img/items/m/gorenje_fn61csy2w_624043_7.jpg'),
(7, 'Морозильник Liebherr GN 1923', 0, 0, '250', 0, '237', '125 – 60 – 63 см', '43990.00', 'https://img.mvideo.ru/Pdb/20031906b3.jpg'),
(8, 'Морозильник Liebherr GN 3735', 0, 0, '230', 0, '154', '165 – 60 – 66,5 см', '80500.00', 'https://static.onlinetrade.ru/img/items/m/morozilnaya_kamera_liebherr_gn_3735_20_001_1252249_5.jpg'),
(9, 'Морозильник Midea MF1142W', 0, 0, '165', 0, '225', '143 – 55 – 55 см', '21990.00', 'https://static.onlinetrade.ru/img/items/m/morozilnaya_kamera_midea_mf1142w_1152087_2.jpg'),
(10, 'Морозильник Атлант М 7184-003', 0, 0, '198', 0, '341', '150 – 60 – 62 см', '26990.00', 'https://krasnodar-diskont.ru/assets/images/products/4643/tovar/atlant-m-7184-003-1.jpg'),
(11, 'Морозильник Атлант М 7203-100', 0, 0, '198', 0, '239', '134 – 59,5 - 62,5 см', '27990.00', 'https://static.onlinetrade.ru/img/items/m/atlant_m_7203_100_2.jpg'),
(12, 'Морозильник Бирюса 14', 0, 0, '210', 0, '200', '85 – 58 – 62 см', '16490.00', 'https://images.satu.kz/99264042_morozilnaya-kamera-biryusa-146sn.jpg'),
(13, 'Морозильник БИРЮСА Б-646', 0, 0, '230', 0, '100', '145 – 60 – 62,5 см', '19990.00', 'https://tashkentcena.com/files/products/5f2d46c61a0be9f9b1a0efb560c734bc.jpg'),
(15, 'Морозильный ларь Liebherr GTP 2756-23', 0, 1, '257', 0, '127', '91,7 – 128,5 – 75,8 см', '65490.00', 'https://img.mvideo.ru/Pdb/20042095b.jpg'),
(16, 'Морозильный ларь БИРЮСА Б-200KX', 0, 0, '190', 0, '365', '81,5 – 75,5 – 66,5 см', '16990.00', 'https://img.mvideo.ru/Pdb/1100025667844b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `MR_Base_Type`
--

CREATE TABLE `MR_Base_Type` (
  `MR_Base_Type_id` int(5) NOT NULL,
  `MR_Base_Type_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `MR_Base_Type`
--

INSERT INTO `MR_Base_Type` (`MR_Base_Type_id`, `MR_Base_Type_name`) VALUES
(0, 'Шкаф'),
(1, 'Ларь');

-- --------------------------------------------------------

--
-- Структура таблицы `MR_Base_User`
--

CREATE TABLE `MR_Base_User` (
  `MR_Base_User_id` int(5) NOT NULL,
  `MR_Base_User_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `MR_Base_User`
--

INSERT INTO `MR_Base_User` (`MR_Base_User_id`, `MR_Base_User_name`) VALUES
(0, 'Подходит для всех холодильников'),
(1, 'Подходит для всех холодильников,морозильников'),
(2, 'Подходит для всех холодильников LIEBHERR'),
(3, 'Подходит для морозильного ларя GT 3632, GT 4232'),
(4, 'Подходит для морозильных ларей серии GTP 2356, GTP 2756'),
(5, 'Подходит для холодильников шириной 60 см серии CBN 39, 36; CBNP 39; SBS');

-- --------------------------------------------------------

--
-- Структура таблицы `Razmer`
--

CREATE TABLE `Razmer` (
  `Razmer_id` int(5) NOT NULL,
  `RazmerCM` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Razmer`
--

INSERT INTO `Razmer` (`Razmer_id`, `RazmerCM`) VALUES
(0, '50 х 60 см'),
(1, '60 х 60 см'),
(2, '50 х 59.4 см'),
(3, '50 х 50 см'),
(4, '50 х 35 см'),
(5, '50 х 59 см'),
(6, '50 х 53 см'),
(7, '50 х 57 см'),
(8, '50 х 47 см'),
(9, '50 х 60 см'),
(10, '50 х 40 см'),
(11, '50 х 54 см');

-- --------------------------------------------------------

--
-- Структура таблицы `Speed`
--

CREATE TABLE `Speed` (
  `Speed_id` int(7) NOT NULL,
  `Speed_name` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Speed`
--

INSERT INTO `Speed` (`Speed_id`, `Speed_name`) VALUES
(0, 800),
(1, 1000),
(2, 1100),
(3, 1200),
(4, 1400),
(5, 1600),
(6, 1500);

-- --------------------------------------------------------

--
-- Структура таблицы `SP_BrandH`
--

CREATE TABLE `SP_BrandH` (
  `SP_BrandH_id` int(5) NOT NULL,
  `SP_BrandH_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `SP_BrandH`
--

INSERT INTO `SP_BrandH` (`SP_BrandH_id`, `SP_BrandH_name`) VALUES
(0, 'Liebherr'),
(1, 'Бирюса'),
(2, 'Stinol'),
(3, 'Атлант'),
(4, 'Bosch'),
(5, 'Indesit'),
(6, 'LG');

-- --------------------------------------------------------

--
-- Структура таблицы `SP_BrandM`
--

CREATE TABLE `SP_BrandM` (
  `SP_BrandM_id` int(5) NOT NULL,
  `SP_BrandM_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `SP_BrandM`
--

INSERT INTO `SP_BrandM` (`SP_BrandM_id`, `SP_BrandM_name`) VALUES
(0, 'Liebherr'),
(1, 'Бирюса'),
(2, 'LERAN'),
(3, 'Атлант'),
(4, 'Gorenje'),
(5, 'Midea'),
(6, 'Haier');

-- --------------------------------------------------------

--
-- Структура таблицы `SP_Brand_Defroz`
--

CREATE TABLE `SP_Brand_Defroz` (
  `id` int(5) NOT NULL,
  `id_brandH` int(5) DEFAULT NULL,
  `id_defroz` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `SP_Brand_Defroz`
--

INSERT INTO `SP_Brand_Defroz` (`id`, `id_brandH`, `id_defroz`) VALUES
(1, 0, 0),
(2, 0, 1),
(3, 0, 2),
(4, 1, 0),
(5, 1, 2),
(6, 2, 0),
(7, 2, 2),
(8, 3, 0),
(9, 3, 2),
(10, 4, 0),
(11, 4, 1),
(12, 4, 2),
(13, 5, 0),
(14, 5, 2),
(15, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `SP_Brand_Type`
--

CREATE TABLE `SP_Brand_Type` (
  `idd` int(5) NOT NULL,
  `id_brandM` int(5) DEFAULT NULL,
  `id_type` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `SP_Brand_Type`
--

INSERT INTO `SP_Brand_Type` (`idd`, `id_brandM`, `id_type`) VALUES
(1, 0, 0),
(2, 0, 1),
(3, 1, 0),
(4, 1, 1),
(5, 2, 0),
(6, 2, 1),
(7, 3, 0),
(8, 4, 0),
(9, 5, 0),
(10, 6, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `SP_Defroz`
--

CREATE TABLE `SP_Defroz` (
  `SP_Defroz_id` int(5) NOT NULL,
  `SP_Defroz_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `SP_Defroz`
--

INSERT INTO `SP_Defroz` (`SP_Defroz_id`, `SP_Defroz_name`) VALUES
(0, 'Капельная система'),
(1, 'No frost'),
(2, 'Ручное');

-- --------------------------------------------------------

--
-- Структура таблицы `SP_Type`
--

CREATE TABLE `SP_Type` (
  `SP_Type_id` int(5) NOT NULL,
  `SP_Type_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `SP_Type`
--

INSERT INTO `SP_Type` (`SP_Type_id`, `SP_Type_name`) VALUES
(0, 'Шкаф'),
(1, 'Ларь');

-- --------------------------------------------------------

--
-- Структура таблицы `Tip_Plit`
--

CREATE TABLE `Tip_Plit` (
  `Tip_Plit_id` int(5) NOT NULL,
  `Tip_Plit_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Tip_Plit`
--

INSERT INTO `Tip_Plit` (`Tip_Plit_id`, `Tip_Plit_name`) VALUES
(0, 'Для газовых'),
(1, 'Для электрических'),
(2, 'Универсальные');

-- --------------------------------------------------------

--
-- Структура таблицы `Tip_Podzig`
--

CREATE TABLE `Tip_Podzig` (
  `Tip_id` int(5) NOT NULL,
  `Tip_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Tip_Podzig`
--

INSERT INTO `Tip_Podzig` (`Tip_id`, `Tip_name`) VALUES
(0, 'Ручной'),
(1, 'Есть');

-- --------------------------------------------------------

--
-- Структура таблицы `Type_Drying`
--

CREATE TABLE `Type_Drying` (
  `Type_Drying_id` int(3) NOT NULL,
  `Type_Drying_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Type_Drying`
--

INSERT INTO `Type_Drying` (`Type_Drying_id`, `Type_Drying_name`) VALUES
(0, 'конденсационная'),
(1, 'AirDry'),
(2, 'теплообменник');

-- --------------------------------------------------------

--
-- Структура таблицы `Type_hose`
--

CREATE TABLE `Type_hose` (
  `Type3_id` int(2) NOT NULL,
  `Type3_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Type_hose`
--

INSERT INTO `Type_hose` (`Type3_id`, `Type3_name`) VALUES
(0, 'Сливной'),
(1, 'Заливной');

-- --------------------------------------------------------

--
-- Структура таблицы `Type_load`
--

CREATE TABLE `Type_load` (
  `Type_id` int(5) NOT NULL,
  `Type_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Type_load`
--

INSERT INTO `Type_load` (`Type_id`, `Type_name`) VALUES
(0, 'Фронтальная'),
(1, 'Вертикальная');

-- --------------------------------------------------------

--
-- Структура таблицы `Type_size`
--

CREATE TABLE `Type_size` (
  `Type2_id` int(3) NOT NULL,
  `Type2_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Type_size`
--

INSERT INTO `Type_size` (`Type2_id`, `Type2_name`) VALUES
(0, 'узкая'),
(1, 'полноразмерная'),
(2, 'компактная');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `role_name`, `first_name`, `middle_name`, `last_name`, `email`, `username`, `password`) VALUES
(10, 2, 'Admin', 'Ivan', 'Aleksandrovich', 'Pavilonin', 'IAP_4@mail.ru', '881_23', '7ZsTB3?KUJfg'),
(12, 0, 'User', 'Maria', 'Sergeevna', 'Galkina', 'MSG_6@mail.ru', '881_231', '7ZsTB3?KUJfg'),
(13, 0, 'User', 'Aleksandra', 'Alexeevna', 'Kataeva', 'AAK_7@mail.ru', 'AAK_7', '44CNBGDWFF'),
(14, 1, 'Moderator', 'Anna', 'Petrovna', 'Kirillova', 'APK_8@mail.ru', '881_232', '7ZsTB3?KUJfg'),
(15, 2, 'Admin', 'Anton', 'Pavlovich', 'Pavilonin', 'APP_9@mail.ru', '881_20', '32ftbdd2'),
(16, 0, 'User', 'Elizaveta', 'Sergeevna', 'Andreeva', 'ESA_10@mail.ru', 'ESA_10', 'vh2Vv3GAbr1g'),
(21, 1, 'Moderator', 'Roman', 'Nikolaevna', 'Mishina', 'SNM@mail.ru', 'M_acc', 'Nice_COCK'),
(48, 0, 'User', 'Sergey', 'Viktorovich', 'Lesnoy', 'BONCH@mail.ru', 'SVL_134', 'fdbhdbsfk'),
(49, 0, 'User', 'Roman', 'Semenovich', 'Demin', 'RSD@gmail.com', 'RSD_881', 'shLfeEqgNhjA'),
(50, 2, 'Admin', 'Potap', 'Andreevich', 'Serov', 'PAS@gmail.com', 'PAS_129', 'qwerwer1234'),
(58, 0, 'User', 'Andrey', 'Semenovich', 'Kuznetsov', 'ASK@mail.ru', 'U_acc', 'Tetstwe'),
(59, 0, 'User', 'Anna', 'Famina', 'Kirillovna', 'APPD@gmail.com', 'QAZvPol', 'OOFBGFT!'),
(60, 0, 'User', 'Kirill', 'Yurkin', 'Stanislavovih', 'RGVSL@mail.ru', 'EWF', 'FVJIHUNBLIGUH'),
(62, 0, 'User', 'Sveta', 'AAAA', 'VVVVVV', 'ASD@gmail.com', 'SSS', 'jsjse'),
(64, 0, 'User', 'AAA', 'AAA', 'AAA', 'AAA@gmail.com', 'AAA', 'khsaiamq');

-- --------------------------------------------------------

--
-- Структура таблицы `Viewshow`
--

CREATE TABLE `Viewshow` (
  `Viewshow_id` int(5) NOT NULL,
  `Viewshow_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Viewshow`
--

INSERT INTO `Viewshow` (`Viewshow_id`, `Viewshow_name`) VALUES
(0, 'Сливной'),
(1, 'Заливной');

-- --------------------------------------------------------

--
-- Структура таблицы `Viewshow_to_Max_t`
--

CREATE TABLE `Viewshow_to_Max_t` (
  `id` int(11) NOT NULL,
  `id_Viewshow` int(5) DEFAULT NULL,
  `id_Max_t` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Viewshow_to_Max_t`
--

INSERT INTO `Viewshow_to_Max_t` (`id`, `id_Viewshow`, `id_Max_t`) VALUES
(1, 0, 0),
(2, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `VR_Base_Brand`
--

CREATE TABLE `VR_Base_Brand` (
  `VR_Base_Brand_id` int(5) NOT NULL,
  `VR_Base_Brand_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `VR_Base_Brand`
--

INSERT INTO `VR_Base_Brand` (`VR_Base_Brand_id`, `VR_Base_Brand_name`) VALUES
(0, 'Bosch'),
(1, 'Бирюса'),
(2, 'Stinol'),
(3, 'Атлант'),
(4, 'Liebherr'),
(5, 'Indesit'),
(6, 'LG');

-- --------------------------------------------------------

--
-- Структура таблицы `VR_Base_Color`
--

CREATE TABLE `VR_Base_Color` (
  `VR_Base_Color_id` int(3) NOT NULL,
  `VR_Base_Color_name` varchar(15) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `VR_Base_Color`
--

INSERT INTO `VR_Base_Color` (`VR_Base_Color_id`, `VR_Base_Color_name`) VALUES
(0, 'Белый'),
(1, 'Серебристый'),
(2, 'Бежевый');

-- --------------------------------------------------------

--
-- Структура таблицы `VR_Base_Defrosting`
--

CREATE TABLE `VR_Base_Defrosting` (
  `VR_Base_Defrosting_id` int(5) NOT NULL,
  `VR_Base_Defrosting_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `VR_Base_Defrosting`
--

INSERT INTO `VR_Base_Defrosting` (`VR_Base_Defrosting_id`, `VR_Base_Defrosting_name`) VALUES
(0, 'Капельная система, ручная'),
(1, 'Капельная система, no frost'),
(2, 'No frost, no frost');

-- --------------------------------------------------------

--
-- Структура таблицы `VR_Base_fridge`
--

CREATE TABLE `VR_Base_fridge` (
  `id` int(11) NOT NULL,
  `VR_Base_F_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `VR_Base_F_Brand` int(5) DEFAULT NULL,
  `VR_Base_F_Volume` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL,
  `VR_Base_F_Defrosting` int(5) DEFAULT NULL,
  `VR_Base_F_Energy` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `VR_Base_F_Size` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `VR_Base_F_Color` int(3) DEFAULT NULL,
  `VR_Base_F_price` decimal(10,2) DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `VR_Base_fridge`
--

INSERT INTO `VR_Base_fridge` (`id`, `VR_Base_F_name`, `VR_Base_F_Brand`, `VR_Base_F_Volume`, `VR_Base_F_Defrosting`, `VR_Base_F_Energy`, `VR_Base_F_Size`, `VR_Base_F_Color`, `VR_Base_F_price`, `image`) VALUES
(4, 'Холодильник Bosch KGN39VK25R VitaFresh', 0, '380', 0, '345', '203 – 60 – 66 см', 0, '50990.00', 'https://img.mvideo.ru/Pdb/20068486b.jpg'),
(5, 'Холодильник Bosch KGV36NL1AR', 0, '316', 0, '347', '185 – 60 – 65 см', 1, '26990.00', 'https://img.mvideo.ru/Pdb/1100023478017b.jpg'),
(6, 'Холодильник Bosch KGV36NW1AR', 0, '317', 0, '347', '185 – 60 – 65 см', 0, '26990.00', 'https://img.mvideo.ru/Pdb/1100022892069b.jpg'),
(7, 'Холодильник Indesit DFE 4200 W', 0, '359', 0, '378', '200 – 60 – 64 см', 0, '28690.00', 'https://img.mvideo.ru/Pdb/20070649b.jpg'),
(9, 'Холодильник LG DoorCooling+ GA-B509CQWL', 0, '384', 0, '325', '203 – 59,5 – 68 см', 2, '43990.00', 'https://img.mvideo.ru/Pdb/20071491b.jpg'),
(10, 'Холодильник LG GA-B419SDJL', 0, '302', 0, '277', '191 – 59,5 – 65,5 см', 1, '33990.00', 'https://img.mvideo.ru/Pdb/20060211b.jpg'),
(11, 'Холодильник LG GR-H802HEHZ', 0, '592', 0, '320', '184 – 86 - 73', 2, '93990.00', 'https://img.mvideo.ru/Pdb/1100023526591b.jpg'),
(12, 'Холодильник Liebherr CNbs 3915', 0, '340', 0, '238', '201 – 60 – 62,5 см', 1, '64500.00', 'https://img.mvideo.ru/Pdb/20069985b.jpg'),
(13, 'Холодильник Liebherr CNPel 4313', 4, '304', 1, '160', '186 – 60 – 66  см', 1, '41490.00', 'https://avatars.mds.yandex.net/get-mpic/1860966/img_id2518535885476845753/9hq'),
(14, 'Холодильник Liebherr CTel 2531', 0, '233', 0, '350', '203 – 60 – 66 см', 1, '26990.00', 'https://micro-line.ru/images/detailed/59/9hq_dp6m-fz.jpg'),
(15, 'Холодильник Stinol STS 1500', 0, '263', 0, '401', '150 – 60 – 62 см', 0, '17400.00', 'https://img.mvideo.ru/Pdb/1100023526646b.jpg'),
(16, 'Холодильник Атлант ХМ 4008-022', 0, '244', 0, '261', '142 – 60 – 63 см', 0, '17990.00', 'https://img.mvideo.ru/Pdb/20031904b.jpg'),
(17, 'Холодильник Атлант ХМ 4208-000', 3, '185', 0, '260', '142,5 – 54,5 – 60 см', 0, '17490.00', 'https://tehmirshop.ru/upload/iblock/1d6/1d60ba5a8082e0e9da5b6e164a20a11d.jpeg'),
(18, 'Холодильник Бирюса 118', 0, '180', 0, '258', '145 – 48 – 60 см', 0, '15990.00', 'https://www.imperiatechno.ru/pictures/product/popup/311700_0.png'),
(43, 'Холодильник LG Signature Instaview Door-in-door LSR100RU', 0, '735', 0, '344', '91 × 178 × 75', 1, '509990.00', 'https://static-sl.insales.ru/images/products/1/2474/330910122/large_LSR100RU.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Water`
--

CREATE TABLE `Water` (
  `Water_id` int(7) NOT NULL,
  `Water_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Water`
--

INSERT INTO `Water` (`Water_id`, `Water_name`) VALUES
(0, '8.5'),
(1, '9'),
(2, '9.5'),
(3, '10'),
(4, '11'),
(5, '13'),
(6, '17.5');

-- --------------------------------------------------------

--
-- Структура таблицы `Width`
--

CREATE TABLE `Width` (
  `Width_id` int(5) NOT NULL,
  `Width_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Width`
--

INSERT INTO `Width` (`Width_id`, `Width_name`) VALUES
(0, '40'),
(1, '59.5'),
(2, '60');

-- --------------------------------------------------------

--
-- Структура таблицы `Width_Type`
--

CREATE TABLE `Width_Type` (
  `id` int(11) NOT NULL,
  `id_Width` int(5) DEFAULT NULL,
  `id_Type` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Width_Type`
--

INSERT INTO `Width_Type` (`id`, `id_Width`, `id_Type`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Accessories`
--
ALTER TABLE `Accessories`
  ADD PRIMARY KEY (`T_A_name`),
  ADD KEY `T_A_tip` (`T_A_tip`),
  ADD KEY `id_A` (`id_A`);

--
-- Индексы таблицы `Brand_V_Plit`
--
ALTER TABLE `Brand_V_Plit`
  ADD PRIMARY KEY (`Brand_id`);

--
-- Индексы таблицы `Color`
--
ALTER TABLE `Color`
  ADD PRIMARY KEY (`Color_id`);

--
-- Индексы таблицы `DB_Dishwasher`
--
ALTER TABLE `DB_Dishwasher`
  ADD PRIMARY KEY (`Base_M_Brand`),
  ADD KEY `Base_M_Brand` (`Base_M_Brand`),
  ADD KEY `Base_M_Type` (`Base_M_Type`),
  ADD KEY `Base_M_Drying_Type` (`Base_M_Drying_Type`),
  ADD KEY `Base_M_Width` (`Base_M_Width`),
  ADD KEY `Base_M_Kolvo` (`Base_M_Kolvo`),
  ADD KEY `Base_M_Water` (`Base_M_Water`),
  ADD KEY `id` (`id_E`);

--
-- Индексы таблицы `DB_Hose`
--
ALTER TABLE `DB_Hose`
  ADD PRIMARY KEY (`Base_N_Brand`),
  ADD KEY `Base_N_Brand` (`Base_N_Brand`),
  ADD KEY `Base_N_Type` (`Base_N_Type`),
  ADD KEY `Base_N_Intend` (`Base_N_Intend`),
  ADD KEY `Base_N_Max_pressure` (`Base_N_Max_pressure`),
  ADD KEY `Base_N_Max_t` (`Base_N_Max_t`),
  ADD KEY `Base_N_Length` (`Base_N_Length`),
  ADD KEY `id_A` (`id_A`);

--
-- Индексы таблицы `DB_Washer`
--
ALTER TABLE `DB_Washer`
  ADD PRIMARY KEY (`Base_D_Brand`),
  ADD UNIQUE KEY `Id_M` (`id_W`),
  ADD KEY `Base_D_Brand` (`Base_D_Brand`),
  ADD KEY `Base_D_Type` (`Base_D_Type`),
  ADD KEY `Base_D_Drying_Function` (`Base_D_Drying_Function`),
  ADD KEY `Base_D_Width` (`Base_D_Width`),
  ADD KEY `Base_D_Max_Load` (`Base_D_Max_Load`),
  ADD KEY `Base_D_Speed` (`Base_D_Speed`);

--
-- Индексы таблицы `Drying_Function`
--
ALTER TABLE `Drying_Function`
  ADD PRIMARY KEY (`Drying_Function_id`);

--
-- Индексы таблицы `EKlass`
--
ALTER TABLE `EKlass`
  ADD PRIMARY KEY (`EKlass_id`);

--
-- Индексы таблицы `E_Plit`
--
ALTER TABLE `E_Plit`
  ADD PRIMARY KEY (`T_E_Name`),
  ADD KEY `T_E_Name` (`T_E_Name`),
  ADD KEY `T_E_Proizvod` (`T_E_Proizvod`),
  ADD KEY `T_E_size` (`T_E_size`),
  ADD KEY `T_E_Color` (`T_E_Color`),
  ADD KEY `T_E_Kol_vo_Komf` (`T_E_Kol_vo_Komf`),
  ADD KEY `T_E_Klass` (`T_E_Klass`),
  ADD KEY `id_E` (`id_E`);

--
-- Индексы таблицы `Gaz_Plit`
--
ALTER TABLE `Gaz_Plit`
  ADD PRIMARY KEY (`T_Gaz_Name`),
  ADD KEY `T_Gaz_Name` (`T_Gaz_Name`),
  ADD KEY `T_Gaz_Proizvod` (`T_Gaz_Proizvod`),
  ADD KEY `T_Gaz_size` (`T_Gaz_size`),
  ADD KEY `T_Gaz_Color` (`T_Gaz_Color`),
  ADD KEY `T_Gaz_Kol_vo_Komf` (`T_Gaz_Kol_vo_Komf`),
  ADD KEY `T_Gaz_Tip` (`T_Gaz_Tip`),
  ADD KEY `id_G` (`id_G`);

--
-- Индексы таблицы `Intend`
--
ALTER TABLE `Intend`
  ADD PRIMARY KEY (`Intend_id`);

--
-- Индексы таблицы `Kolvo`
--
ALTER TABLE `Kolvo`
  ADD PRIMARY KEY (`Kolvo_id`);

--
-- Индексы таблицы `Kol_Vo_Komforok`
--
ALTER TABLE `Kol_Vo_Komforok`
  ADD PRIMARY KEY (`Komfork_id`);

--
-- Индексы таблицы `Length`
--
ALTER TABLE `Length`
  ADD PRIMARY KEY (`Length_id`);

--
-- Индексы таблицы `Max_Load`
--
ALTER TABLE `Max_Load`
  ADD PRIMARY KEY (`Max_Load_id`);

--
-- Индексы таблицы `Max_pressure`
--
ALTER TABLE `Max_pressure`
  ADD PRIMARY KEY (`Max_pressure_id`);

--
-- Индексы таблицы `Max_t`
--
ALTER TABLE `Max_t`
  ADD PRIMARY KEY (`Max_t_id`);

--
-- Индексы таблицы `MR_Base_Acs`
--
ALTER TABLE `MR_Base_Acs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MR_Base_Acs_name_2` (`MR_Base_Acs_name`),
  ADD KEY `MR_Base_Acs_name` (`MR_Base_Acs_name`),
  ADD KEY `MR_Base_Acs_userr` (`MR_Base_Acs_userr`);

--
-- Индексы таблицы `MR_Base_Brand`
--
ALTER TABLE `MR_Base_Brand`
  ADD PRIMARY KEY (`MR_Base_Brand_id`);

--
-- Индексы таблицы `MR_Base_Defrosting`
--
ALTER TABLE `MR_Base_Defrosting`
  ADD PRIMARY KEY (`MR_Base_Defrosting_id`);

--
-- Индексы таблицы `MR_Base_Moroz`
--
ALTER TABLE `MR_Base_Moroz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MR_Base_M_name_2` (`MR_Base_M_name`),
  ADD KEY `MR_Base_M_name` (`MR_Base_M_name`),
  ADD KEY `MR_Base_M_Brand` (`MR_Base_M_Brand`),
  ADD KEY `MR_Base_M_Type` (`MR_Base_M_Type`),
  ADD KEY `MR_Base_M_Defrosting` (`MR_Base_M_Defrosting`);

--
-- Индексы таблицы `MR_Base_Type`
--
ALTER TABLE `MR_Base_Type`
  ADD PRIMARY KEY (`MR_Base_Type_id`);

--
-- Индексы таблицы `MR_Base_User`
--
ALTER TABLE `MR_Base_User`
  ADD PRIMARY KEY (`MR_Base_User_id`);

--
-- Индексы таблицы `Razmer`
--
ALTER TABLE `Razmer`
  ADD PRIMARY KEY (`Razmer_id`);

--
-- Индексы таблицы `Speed`
--
ALTER TABLE `Speed`
  ADD PRIMARY KEY (`Speed_id`);

--
-- Индексы таблицы `SP_BrandH`
--
ALTER TABLE `SP_BrandH`
  ADD PRIMARY KEY (`SP_BrandH_id`);

--
-- Индексы таблицы `SP_BrandM`
--
ALTER TABLE `SP_BrandM`
  ADD PRIMARY KEY (`SP_BrandM_id`);

--
-- Индексы таблицы `SP_Brand_Defroz`
--
ALTER TABLE `SP_Brand_Defroz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_brandH` (`id_brandH`),
  ADD KEY `id_defroz` (`id_defroz`);

--
-- Индексы таблицы `SP_Brand_Type`
--
ALTER TABLE `SP_Brand_Type`
  ADD PRIMARY KEY (`idd`),
  ADD UNIQUE KEY `idd` (`idd`),
  ADD KEY `id_brandM` (`id_brandM`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `SP_Defroz`
--
ALTER TABLE `SP_Defroz`
  ADD PRIMARY KEY (`SP_Defroz_id`);

--
-- Индексы таблицы `SP_Type`
--
ALTER TABLE `SP_Type`
  ADD PRIMARY KEY (`SP_Type_id`);

--
-- Индексы таблицы `Tip_Plit`
--
ALTER TABLE `Tip_Plit`
  ADD PRIMARY KEY (`Tip_Plit_id`);

--
-- Индексы таблицы `Tip_Podzig`
--
ALTER TABLE `Tip_Podzig`
  ADD PRIMARY KEY (`Tip_id`);

--
-- Индексы таблицы `Type_Drying`
--
ALTER TABLE `Type_Drying`
  ADD PRIMARY KEY (`Type_Drying_id`);

--
-- Индексы таблицы `Type_hose`
--
ALTER TABLE `Type_hose`
  ADD PRIMARY KEY (`Type3_id`);

--
-- Индексы таблицы `Type_load`
--
ALTER TABLE `Type_load`
  ADD PRIMARY KEY (`Type_id`);

--
-- Индексы таблицы `Type_size`
--
ALTER TABLE `Type_size`
  ADD PRIMARY KEY (`Type2_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `Viewshow`
--
ALTER TABLE `Viewshow`
  ADD PRIMARY KEY (`Viewshow_id`);

--
-- Индексы таблицы `Viewshow_to_Max_t`
--
ALTER TABLE `Viewshow_to_Max_t`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_Viewshow` (`id_Viewshow`),
  ADD KEY `id_Max_t` (`id_Max_t`);

--
-- Индексы таблицы `VR_Base_Brand`
--
ALTER TABLE `VR_Base_Brand`
  ADD PRIMARY KEY (`VR_Base_Brand_id`);

--
-- Индексы таблицы `VR_Base_Color`
--
ALTER TABLE `VR_Base_Color`
  ADD PRIMARY KEY (`VR_Base_Color_id`);

--
-- Индексы таблицы `VR_Base_Defrosting`
--
ALTER TABLE `VR_Base_Defrosting`
  ADD PRIMARY KEY (`VR_Base_Defrosting_id`);

--
-- Индексы таблицы `VR_Base_fridge`
--
ALTER TABLE `VR_Base_fridge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `VR_Base_F_name_2` (`VR_Base_F_name`),
  ADD KEY `VR_Base_F_name` (`VR_Base_F_name`),
  ADD KEY `VR_Base_F_Brand` (`VR_Base_F_Brand`),
  ADD KEY `VR_Base_F_Defrosting` (`VR_Base_F_Defrosting`),
  ADD KEY `VR_Base_F_Color` (`VR_Base_F_Color`);

--
-- Индексы таблицы `Water`
--
ALTER TABLE `Water`
  ADD PRIMARY KEY (`Water_id`);

--
-- Индексы таблицы `Width`
--
ALTER TABLE `Width`
  ADD PRIMARY KEY (`Width_id`);

--
-- Индексы таблицы `Width_Type`
--
ALTER TABLE `Width_Type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_Width` (`id_Width`),
  ADD KEY `id_Type` (`id_Type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Accessories`
--
ALTER TABLE `Accessories`
  MODIFY `id_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `DB_Dishwasher`
--
ALTER TABLE `DB_Dishwasher`
  MODIFY `id_E` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `DB_Hose`
--
ALTER TABLE `DB_Hose`
  MODIFY `id_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `DB_Washer`
--
ALTER TABLE `DB_Washer`
  MODIFY `id_W` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `E_Plit`
--
ALTER TABLE `E_Plit`
  MODIFY `id_E` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `Gaz_Plit`
--
ALTER TABLE `Gaz_Plit`
  MODIFY `id_G` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `MR_Base_Acs`
--
ALTER TABLE `MR_Base_Acs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `MR_Base_Moroz`
--
ALTER TABLE `MR_Base_Moroz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `SP_Brand_Defroz`
--
ALTER TABLE `SP_Brand_Defroz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `SP_Brand_Type`
--
ALTER TABLE `SP_Brand_Type`
  MODIFY `idd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT для таблицы `Viewshow_to_Max_t`
--
ALTER TABLE `Viewshow_to_Max_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `VR_Base_fridge`
--
ALTER TABLE `VR_Base_fridge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT для таблицы `Width_Type`
--
ALTER TABLE `Width_Type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Accessories`
--
ALTER TABLE `Accessories`
  ADD CONSTRAINT `Accessories_ibfk_1` FOREIGN KEY (`T_A_tip`) REFERENCES `Tip_Plit` (`Tip_Plit_id`);

--
-- Ограничения внешнего ключа таблицы `DB_Dishwasher`
--
ALTER TABLE `DB_Dishwasher`
  ADD CONSTRAINT `DB_Dishwasher_ibfk_1` FOREIGN KEY (`Base_M_Type`) REFERENCES `Type_size` (`Type2_id`),
  ADD CONSTRAINT `DB_Dishwasher_ibfk_2` FOREIGN KEY (`Base_M_Drying_Type`) REFERENCES `Type_Drying` (`Type_Drying_id`),
  ADD CONSTRAINT `DB_Dishwasher_ibfk_3` FOREIGN KEY (`Base_M_Width`) REFERENCES `Width` (`Width_id`),
  ADD CONSTRAINT `DB_Dishwasher_ibfk_4` FOREIGN KEY (`Base_M_Kolvo`) REFERENCES `Kolvo` (`Kolvo_id`),
  ADD CONSTRAINT `DB_Dishwasher_ibfk_5` FOREIGN KEY (`Base_M_Water`) REFERENCES `Water` (`Water_id`);

--
-- Ограничения внешнего ключа таблицы `DB_Hose`
--
ALTER TABLE `DB_Hose`
  ADD CONSTRAINT `DB_Hose_ibfk_1` FOREIGN KEY (`Base_N_Type`) REFERENCES `Type_hose` (`Type3_id`),
  ADD CONSTRAINT `DB_Hose_ibfk_2` FOREIGN KEY (`Base_N_Intend`) REFERENCES `Intend` (`Intend_id`),
  ADD CONSTRAINT `DB_Hose_ibfk_3` FOREIGN KEY (`Base_N_Max_pressure`) REFERENCES `Max_pressure` (`Max_pressure_id`),
  ADD CONSTRAINT `DB_Hose_ibfk_4` FOREIGN KEY (`Base_N_Max_t`) REFERENCES `Max_t` (`Max_t_id`),
  ADD CONSTRAINT `DB_Hose_ibfk_5` FOREIGN KEY (`Base_N_Length`) REFERENCES `Length` (`Length_id`);

--
-- Ограничения внешнего ключа таблицы `DB_Washer`
--
ALTER TABLE `DB_Washer`
  ADD CONSTRAINT `DB_Washer_ibfk_1` FOREIGN KEY (`Base_D_Type`) REFERENCES `Type_load` (`Type_id`),
  ADD CONSTRAINT `DB_Washer_ibfk_2` FOREIGN KEY (`Base_D_Drying_Function`) REFERENCES `Drying_Function` (`Drying_Function_id`),
  ADD CONSTRAINT `DB_Washer_ibfk_3` FOREIGN KEY (`Base_D_Width`) REFERENCES `Width` (`Width_id`),
  ADD CONSTRAINT `DB_Washer_ibfk_4` FOREIGN KEY (`Base_D_Max_Load`) REFERENCES `Max_Load` (`Max_Load_id`),
  ADD CONSTRAINT `DB_Washer_ibfk_5` FOREIGN KEY (`Base_D_Speed`) REFERENCES `Speed` (`Speed_id`);

--
-- Ограничения внешнего ключа таблицы `E_Plit`
--
ALTER TABLE `E_Plit`
  ADD CONSTRAINT `E_Plit_ibfk_1` FOREIGN KEY (`T_E_Proizvod`) REFERENCES `Brand_V_Plit` (`Brand_id`),
  ADD CONSTRAINT `E_Plit_ibfk_2` FOREIGN KEY (`T_E_size`) REFERENCES `Razmer` (`Razmer_id`),
  ADD CONSTRAINT `E_Plit_ibfk_3` FOREIGN KEY (`T_E_Color`) REFERENCES `Color` (`Color_id`),
  ADD CONSTRAINT `E_Plit_ibfk_4` FOREIGN KEY (`T_E_Kol_vo_Komf`) REFERENCES `Kol_Vo_Komforok` (`Komfork_id`),
  ADD CONSTRAINT `E_Plit_ibfk_5` FOREIGN KEY (`T_E_Klass`) REFERENCES `EKlass` (`EKlass_id`);

--
-- Ограничения внешнего ключа таблицы `Gaz_Plit`
--
ALTER TABLE `Gaz_Plit`
  ADD CONSTRAINT `Gaz_Plit_ibfk_1` FOREIGN KEY (`T_Gaz_Proizvod`) REFERENCES `Brand_V_Plit` (`Brand_id`),
  ADD CONSTRAINT `Gaz_Plit_ibfk_2` FOREIGN KEY (`T_Gaz_size`) REFERENCES `Razmer` (`Razmer_id`),
  ADD CONSTRAINT `Gaz_Plit_ibfk_3` FOREIGN KEY (`T_Gaz_Color`) REFERENCES `Color` (`Color_id`),
  ADD CONSTRAINT `Gaz_Plit_ibfk_4` FOREIGN KEY (`T_Gaz_Kol_vo_Komf`) REFERENCES `Kol_Vo_Komforok` (`Komfork_id`),
  ADD CONSTRAINT `Gaz_Plit_ibfk_5` FOREIGN KEY (`T_Gaz_Tip`) REFERENCES `Tip_Podzig` (`Tip_id`);

--
-- Ограничения внешнего ключа таблицы `MR_Base_Acs`
--
ALTER TABLE `MR_Base_Acs`
  ADD CONSTRAINT `MR_Base_Acs_ibfk_1` FOREIGN KEY (`MR_Base_Acs_userr`) REFERENCES `MR_Base_User` (`MR_Base_User_id`);

--
-- Ограничения внешнего ключа таблицы `MR_Base_Moroz`
--
ALTER TABLE `MR_Base_Moroz`
  ADD CONSTRAINT `MR_Base_Moroz_ibfk_1` FOREIGN KEY (`MR_Base_M_Brand`) REFERENCES `MR_Base_Brand` (`MR_Base_Brand_id`),
  ADD CONSTRAINT `MR_Base_Moroz_ibfk_2` FOREIGN KEY (`MR_Base_M_Type`) REFERENCES `MR_Base_Type` (`MR_Base_Type_id`),
  ADD CONSTRAINT `MR_Base_Moroz_ibfk_3` FOREIGN KEY (`MR_Base_M_Defrosting`) REFERENCES `MR_Base_Defrosting` (`MR_Base_Defrosting_id`);

--
-- Ограничения внешнего ключа таблицы `SP_Brand_Defroz`
--
ALTER TABLE `SP_Brand_Defroz`
  ADD CONSTRAINT `SP_Brand_Defroz_ibfk_1` FOREIGN KEY (`id_brandH`) REFERENCES `SP_BrandH` (`SP_BrandH_id`),
  ADD CONSTRAINT `SP_Brand_Defroz_ibfk_2` FOREIGN KEY (`id_defroz`) REFERENCES `SP_Defroz` (`SP_Defroz_id`);

--
-- Ограничения внешнего ключа таблицы `SP_Brand_Type`
--
ALTER TABLE `SP_Brand_Type`
  ADD CONSTRAINT `SP_Brand_Type_ibfk_1` FOREIGN KEY (`id_brandM`) REFERENCES `SP_BrandM` (`SP_BrandM_id`),
  ADD CONSTRAINT `SP_Brand_Type_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `SP_Type` (`SP_Type_id`);

--
-- Ограничения внешнего ключа таблицы `Viewshow_to_Max_t`
--
ALTER TABLE `Viewshow_to_Max_t`
  ADD CONSTRAINT `Viewshow_to_Max_t_ibfk_1` FOREIGN KEY (`id_Viewshow`) REFERENCES `Viewshow` (`Viewshow_id`),
  ADD CONSTRAINT `Viewshow_to_Max_t_ibfk_2` FOREIGN KEY (`id_Max_t`) REFERENCES `Max_t` (`Max_t_id`);

--
-- Ограничения внешнего ключа таблицы `VR_Base_fridge`
--
ALTER TABLE `VR_Base_fridge`
  ADD CONSTRAINT `VR_Base_fridge_ibfk_1` FOREIGN KEY (`VR_Base_F_Brand`) REFERENCES `VR_Base_Brand` (`VR_Base_Brand_id`),
  ADD CONSTRAINT `VR_Base_fridge_ibfk_2` FOREIGN KEY (`VR_Base_F_Defrosting`) REFERENCES `VR_Base_Defrosting` (`VR_Base_Defrosting_id`),
  ADD CONSTRAINT `VR_Base_fridge_ibfk_3` FOREIGN KEY (`VR_Base_F_Color`) REFERENCES `VR_Base_Color` (`VR_Base_Color_id`);

--
-- Ограничения внешнего ключа таблицы `Width_Type`
--
ALTER TABLE `Width_Type`
  ADD CONSTRAINT `Width_Type_ibfk_1` FOREIGN KEY (`id_Width`) REFERENCES `Width` (`Width_id`),
  ADD CONSTRAINT `Width_Type_ibfk_2` FOREIGN KEY (`id_Type`) REFERENCES `Type_load` (`Type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
