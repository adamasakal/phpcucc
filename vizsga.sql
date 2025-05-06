-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Máj 06. 20:34
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vizsga`
--

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateEmployee` (IN `p_name` VARCHAR(50), IN `p_email` VARCHAR(100), IN `p_position` VARCHAR(50))   BEGIN
    INSERT INTO employees (name, email, position) VALUES (p_name, p_email, p_position);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteEmployee` (IN `p_employee_id` INT)   BEGIN
    DELETE FROM employees WHERE id = p_employee_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetEmployee` (IN `p_employee_id` INT)   BEGIN
    SELECT * FROM employees WHERE id = p_employee_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateEmployee` (IN `p_employee_id` INT, IN `p_name` VARCHAR(50), IN `p_email` VARCHAR(100), IN `p_position` VARCHAR(50))   BEGIN
    UPDATE employees
    SET name = p_name,
        email = p_email,
        position = p_position,
        updated_at = CURRENT_TIMESTAMP
    WHERE id = p_employee_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `position`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'Manager', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(2, 'Jane Smith', 'jane.smith@example.com', 'Developer', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(3, 'Mike Jones', 'mike.jones@example.com', 'Analyst', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(4, 'Emily Brown', 'emily.brown@example.com', 'Designer', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(5, 'Chris Taylor', 'chris.taylor@example.com', 'Consultant', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(6, 'Sarah Miller', 'sarah.miller@example.com', 'Administrator', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(7, 'David Clark', 'david.clark@example.com', 'Technician', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(8, 'Lisa White', 'lisa.white@example.com', 'HR Specialist', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(9, 'Kevin Hall', 'kevin.hall@example.com', 'Engineer', '2025-05-06 09:05:18', '2025-05-06 09:05:18'),
(10, 'Rachel Wilson', 'rachel.wilson@example.com', 'Sales Representative', '2025-05-06 09:05:18', '2025-05-06 09:05:18');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
