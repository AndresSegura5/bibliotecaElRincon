-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2022 a las 10:40:23
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 'POEMA', NULL, NULL),
(2, 'NOVELA', NULL, NULL),
(3, 'NARRATIVA', NULL, NULL),
(4, 'DIARIOS', NULL, NULL),
(5, 'LITERATURA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disponible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'si',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `image`, `nombre`, `categoria_id`, `ISBN`, `autor`, `editorial`, `archivo`, `disponible`, `created_at`, `updated_at`) VALUES
(1, 'odisea.jpg', 'Odisea', '1', '978-84-376-0640-8', 'Poema de Homero', 'Letras Universales', 'odisea.pdf', 'si', NULL, NULL),
(2, 'historiadedosciudades.jpg', 'Historia de dos ciudades', '2', '978-84-376-0640-9', 'Charles Dickens', 'Alba editorial', NULL, 'si', NULL, NULL),
(3, 'elprincipito.jpg', 'El principito', '2', '978-84-376-0640-10', 'Antonie de Saint-Exupéry', 'Salamandra', NULL, 'si', NULL, NULL),
(4, 'sueñoenelpabellonrojo.jpg', 'Sueño en el pabellón rojo', '3', '978-84-376-0640-11', 'Cao Xueqin', 'Galaxia Gutenberg', 'sueñoenelpabellonrojo.pdf', 'si', NULL, NULL),
(5, 'elcodigodavinci.jpg', 'El código Da Vinci', '2', '978-84-376-0640-12', 'Dan Brown', 'Doubleday Transworld', NULL, 'si', NULL, NULL),
(6, 'elalquimista.jpg', 'El Alquimista', '2', '978-84-376-0640-13', 'Paulo Coelho', 'Montserrat', NULL, 'si', NULL, NULL),
(7, 'diariodeanafrank.jpg', 'Diario de Ana Frank', '4', '978-84-376-0640-14', 'Ana Frank', 'Garbo', 'diarioanafrank.pdf', 'si', NULL, NULL),
(8, 'cienañosdesoledad.jpg', 'Cien años de soledad', '2', '978-84-376-0640-15', 'Gabriel García Márquez', 'Sudamericana', NULL, 'si', NULL, NULL),
(9, 'anadelastejasverdes.jpg', 'Ana de las tejas verdes', '5', '978-84-376-0640-16', 'Lucy Montgomery', 'Toromítico', NULL, 'si', NULL, NULL),
(10, 'elhobbit.jpg', 'El hobbit', '2', '978-84-376-0640-17', 'J.R.R. Tolkien', 'Minotauro', NULL, 'si', NULL, NULL),
(11, 'mataraunruiseñor.jpg', 'Matar a un ruiseñor', '5', '978-84-376-0640-18', 'Harper Lee', 'J. B. Lippincott & Co', NULL, 'si', NULL, NULL),
(12, '1984.jpg', '1984', '2', '978-84-376-0640-19', 'George Orwell', 'Debolsillo ', NULL, 'si', NULL, NULL),
(13, 'elgrangatsby.jpg', 'El gran Gatsby', '2', '978-84-376-0640-20', 'F. Scott Fitzgerald', 'Compactos ', NULL, 'si', NULL, NULL),
(14, 'charlieylafabricadechocolate.jpg', 'Charlie y la fábrica de chocolate', '3', '978-84-376-0640-21', 'Roald Dahl', 'Alfaguara', 'charlieylafabricadechocolate.pdf', 'si', NULL, NULL),
(15, 'librorojo.jpg', 'Libro rojo', '4', '978-84-376-0640-22', 'Mao Tse-Tung', 'Kamikaze', NULL, 'si', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(489, '2014_10_12_000000_create_users_table', 1),
(490, '2014_10_12_100000_create_password_resets_table', 1),
(491, '2019_08_19_000000_create_failed_jobs_table', 1),
(492, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(493, '2022_02_11_151901_libros', 1),
(494, '2022_02_14_132412_categorias', 1),
(495, '2022_02_14_232217_prestamos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_libro` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion_1` date NOT NULL,
  `fecha_devolucion_2` date DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diasDeRetraso` int(11) NOT NULL DEFAULT 0,
  `estaLibre` int(11) NOT NULL DEFAULT 1,
  `fechaLibre` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `id_libro`, `id_usuario`, `fecha_prestamo`, `fecha_devolucion_1`, `fecha_devolucion_2`, `estado`, `diasDeRetraso`, `estaLibre`, `fechaLibre`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2022-03-05', '2022-03-10', NULL, 'pendiente', 0, 1, NULL, NULL, NULL),
(2, 2, 3, '2022-03-05', '2022-03-10', NULL, 'pendiente', 0, 1, NULL, NULL, NULL),
(3, 3, 4, '2022-03-05', '2022-03-10', '2022-03-12', 'atrasado', 2, 0, '2022-03-14', NULL, '2022-02-24 09:39:59'),
(4, 4, 5, '2022-02-05', '2022-02-10', NULL, 'atrasado', 0, 1, NULL, NULL, NULL),
(5, 5, 6, '2022-03-05', '2022-03-10', '2022-03-10', 'devuelto', 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usuario',
  `cuantosPendientes` int(11) NOT NULL DEFAULT 0,
  `cuantosAtrasados` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `role`, `cuantosPendientes`, `cuantosAtrasados`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminmanana', 'adminmanana@admin.com', NULL, '$2y$10$zQuWkQjOa/SLll2L.vL4UemY7MPjzUK7Vm1umzl74k9yZS5Bp6PlK', 'users.jpg', 'bibliotecario', 0, 0, NULL, NULL, NULL),
(2, 'admintarde', 'admintarde@admin.com', NULL, '$2y$10$iiP0Jfkpz5OnFZwSFJEN7u.qkKCPzMHpgBFzzAVPPYQ/RoHaNPChu', 'users.jpg', 'bibliotecario', 0, 0, NULL, NULL, NULL),
(3, 'user1', 'user1@test.com', NULL, '$2y$10$prfhreTp2XFEZDSqDuB57OJBIez3ZaTM2USvGam0jJKKVOz03Vltu', 'users.jpg', 'usuario', 0, 0, NULL, NULL, NULL),
(4, 'user2', 'user2@test.com', NULL, '$2y$10$O./JrGqcg36SBG7ADxNxQu1ODHlmlGlEGgPKf2Jlo8dW3a5oiOY3K', 'users.jpg', 'usuario', 0, 0, NULL, NULL, NULL),
(5, 'user3', 'user3@test.com', NULL, '$2y$10$j36zaMJoMUkTeTE7X5kSiO6fCTnmzYc1OUPw9CcwJSHtvcvoTCwx.', 'users.jpg', 'usuario', 0, 0, NULL, NULL, NULL),
(6, 'user4', 'user4@test.com', NULL, '$2y$10$zpXe43D1m/FqDUqkUwxnGueLv5uJN6oyVXJ6jfEkyAzJq3Vryj/nu', 'users.jpg', 'usuario', 0, 0, NULL, NULL, NULL),
(7, 'user5', 'user5@test.com', NULL, '$2y$10$1WI0J6OMNpRc8L1xpx4TYeFocoygJpxSnI3hTXTwO15FAu5byFErK', 'users.jpg', 'usuario', 0, 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
