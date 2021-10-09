-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 05:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation', '2021-05-26 09:08:34'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-or', '2021-05-26 09:09:43'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2021-05-26 10:11:17'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', '2021-05-26 10:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(12) NOT NULL,
  `comment_content` text NOT NULL,
  `post_id` int(12) NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `corrent_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `post_id`, `comment_by`, `username`, `corrent_time`) VALUES
(24, '<pre><code class=\"language-html\">hello this is me</code></pre>', 2, '', '', '2021-06-16 10:00:52'),
(26, '<p><br></p><pre><code class=\"language-html\">how can i help you</code></pre>', 2, '', '', '2021-06-16 10:22:48'),
(27, '<p>bhai ye karo apka solve ho jayega</p><p><br></p><pre><code class=\"language-html\">\r\n                            &lt;p class=\"ml-5\"&gt;summary&lt;/p&gt;\r\n                            &lt;p class=\"ml-5\"&gt;summary&lt;/p&gt;\r\n                            &lt;p class=\"ml-5\"&gt;summary&lt;/p&gt;</code></pre>', 2, '', '', '2021-06-16 10:25:03'),
(28, '<p><br></p><pre><code class=\"language-javascript\">function selectText(node) {\r\n    node = document.getElementById(node);\r\n\r\n    if (document.body.createTextRange) {\r\n        const range = document.body.createTextRange();\r\n        range.moveToElementText(node);\r\n        range.select();\r\n    } else if (window.getSelection) {\r\n        const selection = window.getSelection();\r\n        const range = document.createRange();\r\n        range.selectNodeContents(node);\r\n        selection.removeAllRanges();\r\n        selection.addRange(range);\r\n    } else {\r\n        console.warn(\"Could not select text in node: Unsupported browser.\");\r\n    }</code></pre>', 2, '', '', '2021-06-16 10:43:25'),
(32, '<p><br></p><pre class=\"st\"><code class=\"language-html\">echo \' &lt;div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"&gt;\r\n                    &lt;strong&gt;success!&lt;/strong&gt; Your comment has been added!.\r\n                    &lt;button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"&gt;\r\n                        &lt;span aria-hidden=\"true\"&gt;&amp;times;&lt;/span&gt;\r\n                    &lt;/button&gt;\r\n                &lt;/div&gt; \';</code></pre>', 1, 'sanu', 'vikash', '2021-06-16 11:49:27'),
(33, '<p>original answer Please try this</p><pre class=\"st\"><code class=\"language-html\">\r\n\r\n\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n  &lt;meta charset=\"utf-8\"&gt;\r\n  &lt;title&gt;highlight js&lt;/title&gt;\r\n  &lt;!-- bootstrap css --&gt;\r\n  &lt;link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\"&gt;\r\n\r\n  &lt;!-- highlight css --&gt;\r\n  &lt;!-- &lt;link rel=\"stylesheet\" href=\"./styles/base16/atelier-dune.min.css\"&gt; --&gt;\r\n  &lt;link rel=\"stylesheet\" href=\"./styles/a11y-dark.min.css\"&gt;\r\n  &lt;!-- &lt;link rel=\"stylesheet\" href=\"./styles/monokai-sublime.min.css\"&gt; --&gt;\r\n  &lt;!-- highlight js --&gt;\r\n  &lt;script src=\"js/highlight.min.js\"&gt;&lt;/script&gt;\r\n  &lt;script&gt;hljs.highlightAll();&lt;/script&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n  &lt;div class=\"container col-md-6\"&gt;\r\n    &lt;pre&gt;\r\n      &lt;code&gt;   \r\n        var message = \"hello world!\";\r\n        alert(message);\r\n      &lt;/code&gt;\r\n    &lt;/pre&gt;\r\n  &lt;/div&gt;\r\n\r\n  &lt;!-- bootstrap js --&gt;\r\n  &lt;script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n  &lt;script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n  &lt;script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;</code></pre>', 1, 'sanu', 'vikash', '2021-06-16 11:50:54'),
(34, '<p><br></p><pre class=\"st\"><code class=\"language-html\">&lt;!doctype html&gt;\r\n&lt;html lang=\"en\"&gt;\r\n  &lt;head&gt;\r\n    &lt;!-- Required meta tags --&gt;\r\n    &lt;meta charset=\"utf-8\"&gt;\r\n    &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"&gt;\r\n\r\n    &lt;!-- Bootstrap CSS --&gt;\r\n    &lt;link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\"&gt;\r\n    \r\n    &lt;link rel=\"stylesheet\" type=\"text/css\" href=\"css/test.css\"&gt;\r\n\r\n    &lt;title&gt;Hello, world!&lt;/title&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;div class=\"bgimg\"&gt;\r\n          &lt;nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\"&gt;\r\n      &lt;a class=\"navbar-brand\" href=\"#\"&gt;Navbar&lt;/a&gt;\r\n      &lt;button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"&gt;\r\n        &lt;span class=\"navbar-toggler-icon\"&gt;&lt;/span&gt;\r\n      &lt;/button&gt;\r\n\r\n      &lt;div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\"&gt;\r\n        &lt;ul class=\"navbar-nav ml-auto\"&gt;\r\n          &lt;li class=\"nav-item active\"&gt;\r\n            &lt;a class=\"nav-link\" href=\"#\"&gt;Home &lt;span class=\"sr-only\"&gt;(current)&lt;/span&gt;&lt;/a&gt;\r\n          &lt;/li&gt;\r\n          &lt;li class=\"nav-item\"&gt;\r\n            &lt;a class=\"nav-link\" href=\"#\"&gt;Link&lt;/a&gt;\r\n          &lt;/li&gt;\r\n          &lt;li class=\"nav-item dropdown\"&gt;\r\n            &lt;a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"&gt;\r\n              Dropdown\r\n            &lt;/a&gt;\r\n            &lt;div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\"&gt;\r\n              &lt;a class=\"dropdown-item\" href=\"#\"&gt;Action&lt;/a&gt;\r\n              &lt;a class=\"dropdown-item\" href=\"#\"&gt;Another action&lt;/a&gt;\r\n              &lt;div class=\"dropdown-divider\"&gt;&lt;/div&gt;\r\n              &lt;a class=\"dropdown-item\" href=\"#\"&gt;Something else here&lt;/a&gt;\r\n            &lt;/div&gt;\r\n          &lt;/li&gt;\r\n          &lt;li class=\"nav-item\"&gt;\r\n            &lt;a class=\"nav-link disabled\" href=\"#\"&gt;Disabled&lt;/a&gt;\r\n          &lt;/li&gt;\r\n        &lt;/ul&gt;\r\n        &lt;form class=\"form-inline my-2 my-lg-0\"&gt;\r\n          &lt;input class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\"&gt;\r\n          &lt;button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\"&gt;Search&lt;/button&gt;\r\n        &lt;/form&gt;\r\n      &lt;/div&gt;\r\n    &lt;/nav&gt;\r\n\r\n    &lt;div id=\"typed-strings\"&gt;\r\n        &lt;p&gt;Welcome to my &lt;strong&gt;channel&lt;/strong&gt; .&lt;/p&gt;\r\n        &lt;p&gt;Hope you like my videos.&lt;/p&gt;\r\n        &lt;p&gt;Subscribe to my channel :)&lt;/p&gt;\r\n        &lt;p&gt;For move awesome viedos.&lt;/p&gt;\r\n      &lt;/div&gt;\r\n\r\n    &lt;div class=\"container text-center headerset\"&gt;\r\n      &lt;h2&gt;Welcome to our studio! &lt;/h2&gt;\r\n      &lt;h1 class=\"jumbotron-heading\"&gt;\r\n        &lt;span id=\"typed\"&gt;&lt;/span&gt;\r\n      &lt;/h1&gt;\r\n\r\n      &lt;!-- &lt;button class=\"btn btn-warning text-white btn-lg\"&gt;SUBSCRIBE&lt;/button&gt; --&gt;\r\n      &lt;a href=\"#\" class=\"btn btn-warning text-white btn-lg\"&gt;SUBSCRIBE&lt;/a&gt;\r\n    &lt;/div&gt;\r\n\r\n  &lt;/div&gt;\r\n\r\n    &lt;!-- Optional JavaScript --&gt;\r\n    &lt;!-- jQuery first, then Popper.js, then Bootstrap JS --&gt;\r\n    &lt;script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;!-- type.js cdn --&gt;\r\n    &lt;script src=\"https://s3.amazonaws.com/myadvobuck/static/libs/typed.min.js\"&gt;&lt;/script&gt;\r\n\r\n    &lt;script&gt;\r\n    var type = new Typed(\'#typed\', {\r\n      stringsElement: \'#typed-strings\',\r\n      typeSpeed: 100,\r\n      backSpeed: 20,\r\n      loop: true,\r\n      loopCount: 20,\r\n    });\r\n  &lt;/script&gt;\r\n\r\n\r\n  &lt;/body&gt;\r\n&lt;/html&gt;</code></pre>', 1, 'sanu', 'vikash', '2021-06-16 15:00:00'),
(35, '<p>bhai karo maja aa jayega</p><pre><code class=\"language-php\">if($row &gt; 0){\r\n                      while($row1 = mysqli_fetch_array($result)){\r\n                          $id = $row1[\'thread_id\'];\r\n                        echo \'&lt;div class=\"media my-3\"&gt;\r\n                                &lt;img src=\"images/image2.png\" width=\"54px\" class=\"mr-3\" alt=\"...\"&gt;\r\n                                &lt;div class=\"media-body\"&gt;\r\n                                    &lt;h5 class=\"mt-0\"&gt;&lt;a href=\"thread.php?threadid=\'.$id.\'\" class=\"\" style=\"text-decoration: none;\"&gt;\'.$row1[\'thread_title\'].\'&lt;/a&gt;&lt;/h5&gt;\r\n                                    \r\n                                    &lt;hr&gt;\r\n                                &lt;/div&gt;\r\n                            &lt;/div&gt;\';</code></pre><pre><br></pre>', 11, 'sanu', 'vikash', '2021-06-17 08:10:24'),
(36, '<p>hello guys</p><pre class=\"st\"><code class=\"language-html\">&lt;!doctype html&gt;\r\n&lt;html lang=\"en\"&gt;\r\n  &lt;head&gt;\r\n    &lt;!-- Required meta tags --&gt;\r\n    &lt;meta charset=\"utf-8\"&gt;\r\n    &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"&gt;\r\n\r\n    &lt;!-- Bootstrap CSS --&gt;\r\n    &lt;link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\"&gt;\r\n\r\n    &lt;link rel=\"stylesheet\" type=\"text/css\" href=\"css/prism.css\"&gt;\r\n\r\n    &lt;title&gt;Hello, world!&lt;/title&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n\r\n    &lt;pre&gt;\r\n      &lt;code class=\"language-php\"&gt;\r\n        while($row1 = mysqli_fetch_array($result)){\r\n                          $id = $row1[\'thread_id\'];\r\n                        echo \'&lt;div class=\"media my-3\"&gt;\r\n                                &lt;div class=\"media-body\"&gt;\r\n                                    &lt;h5 class=\"mt-0\"&gt;&lt;a href=\"thread.php?threadid=\'.$id.\'\" class=\"\" style=\"text-decoration: none;\"&gt;\'.$row1[\'thread_title\'].\'&lt;/a&gt;&lt;/h5&gt;\r\n                                    \'.$row1[\'tags\'].\'\r\n                                    &lt;hr&gt;\r\n                                &lt;/div&gt;\r\n                            &lt;/div&gt;\';\r\n      &lt;/code&gt;\r\n    &lt;/pre&gt;\r\n  \r\n\r\n    &lt;!-- Optional JavaScript --&gt;\r\n    &lt;!-- jQuery first, then Popper.js, then Bootstrap JS --&gt;\r\n    &lt;script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n\r\n    &lt;!-- prism js --&gt;\r\n    &lt;script type=\"text/javascript\" src=\"js/prism.js\"&gt;&lt;/script&gt;\r\n\r\n  &lt;/body&gt;\r\n&lt;/html&gt;</code></pre>', 11, 'sanu', 'vikash', '2021-06-17 10:32:58'),
(37, '<p>hum kya kare</p><pre class=\"st\"><code class=\"language-html\">&lt;!doctype html&gt;\r\n&lt;html lang=\"en\"&gt;\r\n  &lt;head&gt;\r\n    &lt;!-- Required meta tags --&gt;\r\n    &lt;meta charset=\"utf-8\"&gt;\r\n    &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"&gt;\r\n\r\n    &lt;!-- Bootstrap CSS --&gt;\r\n    &lt;link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\"&gt;\r\n\r\n    &lt;link rel=\"stylesheet\" type=\"text/css\" href=\"css/prism.css\"&gt;\r\n\r\n    &lt;title&gt;Hello, world!&lt;/title&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n\r\n    &lt;pre&gt;\r\n      &lt;code class=\"language-php\"&gt;\r\n        while($row1 = mysqli_fetch_array($result)){\r\n                          $id = $row1[\'thread_id\'];\r\n                        echo \'&lt;div class=\"media my-3\"&gt;\r\n                                &lt;div class=\"media-body\"&gt;\r\n                                    &lt;h5 class=\"mt-0\"&gt;&lt;a href=\"thread.php?threadid=\'.$id.\'\" class=\"\" style=\"text-decoration: none;\"&gt;\'.$row1[\'thread_title\'].\'&lt;/a&gt;&lt;/h5&gt;\r\n                                    \'.$row1[\'tags\'].\'\r\n                                    &lt;hr&gt;\r\n                                &lt;/div&gt;\r\n                            &lt;/div&gt;\';\r\n      &lt;/code&gt;\r\n    &lt;/pre&gt;\r\n  \r\n\r\n    &lt;!-- Optional JavaScript --&gt;\r\n    &lt;!-- jQuery first, then Popper.js, then Bootstrap JS --&gt;\r\n    &lt;script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n    &lt;script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"&gt;&lt;/script&gt;\r\n\r\n    &lt;!-- prism js --&gt;\r\n    &lt;script type=\"text/javascript\" src=\"js/prism.js\"&gt;&lt;/script&gt;\r\n\r\n  &lt;/body&gt;\r\n&lt;/html&gt;</code></pre>', 11, 'sanu', 'vikash', '2021-06-17 10:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `postb`
--

CREATE TABLE `postb` (
  `post_id` int(12) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postb`
--

INSERT INTO `postb` (`post_id`, `title`, `content`) VALUES
(1, 'How can i help you', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi libero necessitatibus, quis nulla laboriosam doloremque atque exercitationem ut ipsam mollitia enim minima ab ratione quos. Obcaecati architecto nostrum laboriosam impedit?'),
(2, 'I hope will be understand', 'exercitationem ut ipsam mollitia enim minima ab ratione quos. Obcaecati architecto nostrum laboriosam impedit?'),
(3, 'hey solve this ', '3+5');

-- --------------------------------------------------------

--
-- Table structure for table `que_threads`
--

CREATE TABLE `que_threads` (
  `thread_id` int(8) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(8) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `que_threads`
--

INSERT INTO `que_threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `posted_by`, `timestamp`, `tags`) VALUES
(1, 'Unable to install pyaudio error in windows 10', '<p>i am unable to install pyadio</p><pre><code class=\"language-php\">&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;</code></pre>', 1, '0', '2021-05-26 11:09:06', 'Codeigniter, CakePHP, Zend'),
(2, 'my pc is very slow', 'Please help me how can i fix this', 1, '0', '2021-05-26 13:56:01', 'Codeigniter, CakePHP, Zend'),
(9, '$ is not a function', '$.document', 2, 'vikrantmalhotra', '2021-05-26 16:40:17', 'Codeigniter, CakePHP, Zend'),
(11, 'Lets learn about stock marketing', '<p>hum hai to kya gum hai</p><pre><code class=\"language-html\">&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;&lt;?php\r\n    include \'partials/dbconnection.php\';\r\n?&gt;</code></pre>', 0, 'sanum', '2021-06-17 13:30:38', 'Codeigniter, CakePHP, Zend'),
(12, 'what is python? explain in details', '<p>explain in brief</p><pre class=\"st\"><code class=\"language-html\">&lt;link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\"&gt;\r\n    &lt;link href=\"https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css\" rel=\"stylesheet\"&gt;\r\n\r\n    &lt;!-- highlight css --&gt;\r\n  &lt;!-- &lt;link rel=\"stylesheet\" href=\"./styles/base16/atelier-dune.min.css\"&gt; --&gt;\r\n  &lt;!-- &lt;link rel=\"stylesheet\" href=\"./styles/a11y-dark.min.css\"&gt; --&gt;\r\n  &lt;!-- &lt;link rel=\"stylesheet\" href=\"./styles/monokai-sublime.min.css\"&gt; --&gt;\r\n  &lt;!-- highlight js --&gt;\r\n  &lt;!-- &lt;script src=\"js/highlight.min.js\"&gt;&lt;/script&gt;\r\n  &lt;script&gt;hljs.highlightAll();&lt;/script&gt; --&gt;\r\n\r\n  &lt;!-- prism css --&gt;\r\n  &lt;link rel=\"stylesheet\" type=\"text/css\" href=\"css/prism.css\"&gt;\r\n  &lt;!-- prism js --&gt;\r\n    &lt;script type=\"text/javascript\" src=\"js/prism.js\"&gt;&lt;/script&gt;</code></pre>', 0, 'sanum', '2021-06-18 10:03:56', 'PHP, JQuery');

-- --------------------------------------------------------

--
-- Table structure for table `signupuser`
--

CREATE TABLE `signupuser` (
  `id` int(12) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email_Id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signupuser`
--

INSERT INTO `signupuser` (`id`, `FirstName`, `LastName`, `Email_Id`, `password`, `date`, `token`, `status`) VALUES
(31, 'vikash', 'm', 'purposetesting92@gmail.com', '$2y$10$LBUkiCkrWpMtNdtwjRZiuOmmiio.ww1XHU4ZmLWXWM0X75Hp3.WFa', '2021-06-19 07:25:42', '8af07b7d0d4a802e8e2a4c4f528721', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `postb`
--
ALTER TABLE `postb`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `que_threads`
--
ALTER TABLE `que_threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `que_threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `signupuser`
--
ALTER TABLE `signupuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `postb`
--
ALTER TABLE `postb`
  MODIFY `post_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `que_threads`
--
ALTER TABLE `que_threads`
  MODIFY `thread_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `signupuser`
--
ALTER TABLE `signupuser`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
