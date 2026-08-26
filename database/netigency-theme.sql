-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2026 at 03:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netigency-theme`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `desc` text DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `cv_file` text DEFAULT NULL,
  `about_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `language_id`, `section_title`, `title`, `desc`, `video_link`, `cv_file`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'About Us', 'We craft scalable web solutions with 5+ years of experience', 'We design and develop custom websites, ecommerce stores, CRM, HRM, POS, and business platforms with clean code, modern UI, and reliable performance.', 'https://youtu.be/9dqvwS7NoxI', '1718511395-All Services Presentation 1(784kb).pdf', 'demo-about.png', '2024-02-07 06:50:28', '2026-08-21 03:31:13'),
(2, 4, 'আমাদের সম্পর্কে', 'আমরা এখানে 0২ বছরের ব্যবহারকারীর অভিজ্ঞতা নিয়ে আছি', 'আমরা আপনার প্রকল্পে সময় অপচয় এবং সিদ্ধান্তহীনতা কমাতে বিশেষজ্ঞ। অগণিত ক্লায়েন্ট এবং ব্র্যান্ড আমাদের সহযোগিতার সাথে তাদের সন্তুষ্টির কথা জানিয়েছে। অসংখ্য সন্তুষ্ট গ্রাহক এবং ব্র্যান্ড আমাদের সাথে কাজ করে তাদের সন্তুষ্টির প্রমাণ দেয়।', 'https://youtu.be/9dqvwS7NoxI', '1730543838-1718511395-All Services Presentation 1(784kb).pdf', 'demo-about.png', '2024-11-02 10:37:18', '2026-08-21 07:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_name` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `desc` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1,
  `blog_image` text DEFAULT NULL,
  `type` enum('with_this_account','anonymous') NOT NULL,
  `slug` varchar(191) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `tag` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `breadcrumb_status` int(11) NOT NULL DEFAULT 0,
  `custom_breadcrumb_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `language_id`, `category_name`, `category_id`, `author_name`, `user_id`, `title`, `desc`, `short_desc`, `image_status`, `blog_image`, `type`, `slug`, `view`, `status`, `tag`, `meta_desc`, `meta_keyword`, `breadcrumb_status`, `custom_breadcrumb_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 1, NULL, NULL, 'Why need Marketing services for Business?', '<p><b><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">Maximizing Business Potential:\nThe Importance of Digital Marketing Services</span></b></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Digital marketing services play a crucial role in the success and\ngrowth of businesses in today\'s digital era. Here are several compelling\nreasons why investing in digital marketing services is essential:</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Online Visibility and\nReach:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Digital marketing\nhelps businesses establish a strong online presence, making it easier for\npotential customers to find and engage with your brand. It expands your reach\nbeyond local markets, reaching a global audience.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Targeted Advertising:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Digital marketing allows for precise targeting of specific\ndemographics, interests, and behaviors. This ensures that your marketing\nefforts are directed towards the audience most likely to be interested in your\nproducts or services.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Cost-Effectiveness:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Compared to traditional advertising channels, digital marketing\nis often more cost-effective. You can optimize your budget, track performance\nin real-time, and make adjustments to campaigns to maximize return on\ninvestment (ROI).</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Measurable Results:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> One of the key advantages of digital marketing is the\nability to measure and analyze campaign performance. Through analytics tools,\nbusinesses can track metrics such as website traffic, conversion rates, and\nengagement, allowing for data-driven decision-making.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social Media Presence:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Digital marketing includes strategies for building and\nmaintaining a strong presence on social media platforms. Social media marketing\nhelps businesses connect with their audience, build brand loyalty, and leverage\nuser-generated content.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Search Engine Optimization\n(SEO):</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> SEO is a fundamental\naspect of digital marketing that enhances a website\'s visibility on search\nengines. Higher search engine rankings lead to increased organic traffic and\nimproved chances of attracting potential customers.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Brand Awareness and\nRecognition:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Consistent and\nstrategic digital marketing efforts contribute to brand awareness and\nrecognition. Engaging content, targeted campaigns, and a cohesive online\npresence help your brand stand out in a crowded digital landscape.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Competitive Advantage:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Businesses that leverage digital marketing gain a\ncompetitive advantage. An effective online strategy allows you to stay ahead of\ncompetitors, especially in industries where a strong online presence is crucial\nfor success.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Customer Engagement and\nInteraction:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Digital marketing fosters\ndirect communication with your audience. Through social media, email, and other\nonline channels, businesses can engage in real-time conversations, gather\nfeedback, and build relationships with customers.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">E-commerce Growth:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> For businesses involved in e-commerce, digital marketing is\nessential for driving traffic to the website, increasing conversions, and\nexpanding the customer base. E-commerce strategies such as online advertising\nand email campaigns can significantly impact sales.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Adaptability and\nFlexibility:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Digital marketing\nallows businesses to adapt quickly to changing market conditions. Campaigns can\nbe adjusted in real-time, and new strategies can be implemented swiftly to\nrespond to evolving customer preferences and industry trends.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Data-Driven Decision\nMaking:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> The wealth of data\ngenerated through digital marketing campaigns provides valuable insights.\nAnalyzing this data allows businesses to understand customer behavior,\npreferences, and trends, enabling informed decision-making for future\nstrategies.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">In summary, digital marketing services are essential for\nbusinesses aiming to thrive in the digital age. From building brand awareness\nto driving conversions, digital marketing offers a comprehensive and effective\napproach to reaching and engaging with your target audience.</span></p>', 'Digital marketing services play a crucial role in the success and growth of businesses in today\'s digital era. Here [..]', 1, 'demo-blog-01.png', 'anonymous', 'the-golden-rule-between-unique-design', 622, 1, '', 'We are always ready to help you for your business growth with website development, digital marketing and video editing. If need any kind of help please contact us by using our official website netigian.com', 'netigian, netigian it, netigian web development, netigian digital agency, digital agency in bangladesh, web agency in bangladesh, it company in bangladesh, best digital agency in bangladesh', 1, NULL, '2024-02-13 16:56:26', '2025-12-16 17:23:38'),
(3, 1, 'Web Development', 1, NULL, NULL, 'Why need High Quality Video for Business', '<p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><b><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#171718;\">The\nPower of High-Quality Video Content in the Digital Age</span></b></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">High-quality video content is a powerful tool for business\ndevelopment in the digital age. Here are several compelling reasons why\ninvesting in high-quality video is crucial for the growth and success of your\nbusiness:</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Captures Attention:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> High-quality videos grab the viewer\'s attention quickly and\neffectively. With engaging visuals, professional production, and compelling\nstorytelling, you can create a lasting impression that sets your business apart.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Boosts Brand Image:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Quality matters when it comes to brand perception.\nHigh-quality videos convey professionalism and attention to detail, positively\ninfluencing how your audience perceives your brand. It helps establish trust\nand credibility.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Enhances User Engagement: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Video is a highly engaging medium. Viewers are more likely to\nspend time watching a well-produced video than reading a lengthy text.\nIncreased engagement can lead to better understanding of your products or\nservices and, ultimately, increased conversion rates.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Effective Communication:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Videos allow you to communicate complex messages in a clear\nand concise manner. Through visuals, demonstrations, and storytelling, you can\nconvey information more effectively than with text alone.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Improved SEO Performance:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> High-quality videos can contribute to better search engine\nrankings. Search engines like Google often prioritize video content, and a\nwell-optimized video can enhance your online visibility, driving more traffic\nto your website.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social Media Visibility:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Social media platforms prioritize video content in their\nalgorithms. Sharing high-quality videos on platforms like Facebook, Instagram,\nand LinkedIn increases your visibility, engagement, and the likelihood of\ncontent being shared by users.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Showcases\nProducts/Services:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Video is an\nexcellent medium for showcasing your products or services. Whether through\nproduct demonstrations, tutorials, or customer testimonials, high-quality\nvideos help potential customers understand the value you offer.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Expands Audience Reach:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Videos have a higher potential to go viral compared to text\nor images. With shareable and relatable content, your videos can reach a wider\naudience, exposing your business to new markets and demographics.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Mobile-Friendly\nExperience: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">As more users access\ncontent on mobile devices, high-quality videos ensure a positive viewing\nexperience across various screen sizes. Responsive design and high resolution\ncater to the preferences of mobile users.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Measurable Results:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> With analytics tools, you can track the performance of your\nvideos. Insights into viewer behavior, engagement metrics, and conversion rates\nallow you to refine your video marketing strategy for better results.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Stands Out in Crowded\nMarkets:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> In competitive\nindustries, high-quality videos act as a differentiator. When your content\nstands out with superior production values, it\'s more likely to be remembered\nand shared, helping your business stay top-of-mind.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Investing in high-quality video is an investment in the overall\ngrowth and success of your business, providing a versatile and impactful way to\nconnect with your audience in the digital landscape.</span></p>', 'High-quality video content is a powerful tool for business development in the digital age. Here are several compelling [...]', 1, 'demo-blog-02.png', 'anonymous', 'how-to-create-a-design-brief', 899, 1, '', 'We are always ready to help you for your business growth with website development, digital marketing and video editing. If need any kind of help please contact us by using our official website netigian.com', 'netigian, netigian it, netigian web development, netigian digital agency, digital agency in bangladesh, web agency in bangladesh, it company in bangladesh, best digital agency in bangladesh', 1, NULL, '2024-02-13 17:17:11', '2025-12-23 14:18:33'),
(4, 1, 'Web Development', 1, 'Netigian IT', 1, 'Why need Website for Business growth?', '<p><b><span style=\"font-size:14pt;font-family:Arial, \'sans-serif\';color:#000000;\">We explained some reasons why you\nneed a website for business growth.</span></b></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Online appearance: the </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">website will help you to grow your business globally. It helps to\nallowing potential customers from around the world and to engage your customers\nwith products and services.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Proficiency and\nCredibility:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> You need to design\nyour website professionally to convert customers from awareness. Many customers\ntoday expect an online presence and a well-crafted website to contribute to you.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Accessible Information:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Your website should serve a centralized hub for information\nabout your business. Customers can easily find details about your product or\nservices, contact information, and any other relevant information.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Availability: The website</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> obviously should be available all the time, because any time\nyour customer will check your site to get information about your services.\nThat\'s why you need to but a domain and hosting to show your website live.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Marketing and Advertising:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> The website serves as a powerful marketing tool, that will\nshowcase your product, run campaigns, and share valuable content with your\naudience. The website tools will help you with your marketing efforts and save\ntime and money.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Customer Engagement:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Through features like contact forms to get usernames,\nemails, and addresses also for chat support, and social media integration. A\nwebsite should have facilities for engaging in direct communication with your\ncustomers. </span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Competitive Advantage:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> A well-maintained website will give you more advantages than\nyour competitor. Otherwise, you will be down from your other competitors in\nyour industry. Customer is now adapted and used to online and technological\nthings.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Analytics and Insightes:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> The website offers some tools that will help you that how\nmuch audience visited your website and which page click users from which\ncountry means you will get all kinds of information by using analytics tools.\nGoogle Analytics also will help you, if you connect your website with Google\nAnalytics.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Cost-Effective Marketing\nand Time:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Compared to\ntraditional marketing channels, maintaining a website is a cost effective way\nto grow and market your business. It offers a platform to showcase your product\nat the low cost associated with print.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Customer Preferences:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Many customers prefer to purchase products or services\nonline without any hassles. website making it easy to interact with customer\nwith your business at their own pace.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Website is a fundamental asset for any business in the digital\nlandscape. it provides a platform to showcase your products or services, engage\nwith customers, and drive your business growth.</span></p>', 'Website is a powerful tool to grow your business at Online. Below we explained some reasons why we need website [..]', 1, 'demo-blog-03.png', 'with_this_account', 'why-you-need-website-to-develop-your-business', 934, 1, 'netigian, netigian it, netigian digital agency, web development agency, web agency, digital agency', 'We are always ready to help you for your business growth with website development, digital marketing and video editing. If need any kind of help please contact us by using our official website netigian.com', 'netigian, netigian it, netigian web development, netigian digital agency, digital agency in bangladesh, web agency in bangladesh, it company in bangladesh, best digital agency in bangladesh', 1, NULL, '2024-02-19 16:45:24', '2025-12-20 15:30:18'),
(5, 1, 'Web Development', 1, 'Al Mamun', 7, 'Guide to Achieving Social Media Marketing', '<p><b><span style=\"font-size:14pt;font-family:Arial, \'sans-serif\';color:#000000;\">The Definitive Guide to Social\nMedia Marketing Success in 2024</span></b></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">In 2024, social media marketing remains to be a powerful and\never-evolving field. With new platforms surfacing, algorithms constantly\nchanging, and user behaviors relocating, staying ahead in the social media game\nrequires up-to-date plans and a keen understanding of the landscape. Here’s\nyour ultimate guide to gaining social media marketing success in 2024.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">1. Embrace New Platforms\nand Features:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">While giants like\nFacebook, Instagram, and Twitter remain major, newer platforms like TikTok and\nsurfacing ones like BeReal are capturing expressive attention. Keeping an eye\non these directions is crucial. For example, TikTok\'s short-form, attractive content\ncontinues to dominate, making it essential for brands targeting younger\ndemographics. Meanwhile, Instagram Reels and YouTube Shorts are also\nestablishing effective quick, attractive content.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">2. Prioritize Authenticity\nand Transparency:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">In 2024, genuineness is\nmore crucial than ever. Users crave genuine connections and clear communication\nfrom brands. This means display the human side of your business, being honest\nabout your valuations, and engaging in two-way conversations. User-generated\ncontent, behind-the-scenes looks, and authentic storytelling are key plans to\nbuild trust and dedication.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">3. Leverage AI and\nAutomation:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Artificial Intelligence\n(AI) and automation tools are becoming essential for efficient social media\nmanagement. AI-driven analytics can provide a deep understanding of user\nbehavior, content performance, and maximum posting times. Automation tools can\nhelp schedule posts, manage interactions, and streamline your workflow,\nallowing you to focus more on plans and creativity.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">4. Invest in Video Content:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Video remains the king of content in 2024. With platforms like\nTikTok and the rise of Instagram Reels and YouTube Shorts, short-form video\ncontent is especially impressive. Live streaming is also gaining traction,\noffering real-time attractive opportunities. Investing in high-quality video\nproduction and creative storytelling will help your brand stand out.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> 5. Focus on\nCommunity Building:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Building a dedicated\ncommunity should be at the heart of your social media plans. This affects not\njust production messages but also fostering a sense of friendship among your\nfollowers. Involve your audience through comments, direct messages, and interactive\ncontent like polls and Q&amp;A sessions. Creating a brand community can lead to\nhigher engagement and organic growth.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">6. Utilize Influencer\nPartnerships:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Influencer marketing\ncontinues to be a powerful tool. However, the route has evolved.\nMicro-influencers and nano-influencers, with their niche audiences and higher\nengagement qualities, are established to be more effective than celebrity\napprovals. Partnering with authorities who align with your brand values and\nhave authentic connections with their followers can drive expressive engagement.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">7. Stay Updated with\nAlgorithm Changes:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social media algorithms\nare constantly progressing, affecting how content is distributed and seen.\nStaying informed about these changes and conforming your plans accordingly is\ncrucial. Whether it’s the emphasis on video content, the importance of\nengagement standards, or the rise of paid creations, understanding algorithm\nupdates can help maintain your content’s visibility.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">8. Measure and Analyze\nPerformance:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Repeatedly analyzing your\nsocial media interpretation helps you understand what’s working and what’s not.\nUtilize analytics instruments supplied by platforms, as well as third-party\ninstruments, to track metrics such as engagement rates, reach, transformations,\nand ROI. This data-driven route enables you to refine your plans and improve\nyour results over time.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">9. Incorporate Social\nCommerce:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social commerce, the\nmerging of e-commerce with social media platforms, is coming rapidly. Features\nlike Instagram Shopping, Facebook Marketplace, and TikTok Shopping allow users\nto purchase straight from the platform. This seamless shopping experience can\ncompletely boost sales and enhance user convenience.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">10. Prioritize Customer\nExperience:</span></b><b><span style=\"font-family:Arial, \'sans-serif\';\"> </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Finally, outstanding\ncustomer service on social media is non-negotiable. Quick responses to\nexaminations, resolving issues, and being positive with your audience can\nimprove your brand reputation. Using chatbots for immediate responses and\ndedicating a team to handle social media relations can improve customer content.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Success in social media marketing in 2024 hinges on staying\nversatile, authentic, and data-driven. By connecting new trends, leveraging\ntechnology, and fostering real connections, you can create a robust social\nmedia strategy that not only enhances your brand’s brightness but also builds a\nloyal community and runs business growth.</span></p>', 'In 2024, social media marketing remains to be a powerful and ever-evolving field. With new platforms surfacing [..]', 1, 'demo-blog-04.png', 'anonymous', 'the-ultimate-guide-to-social-media-marketing-success-in-2024', 706, 1, 'Social Media Marketing 2024, New Social Media Platforms, Social Media Algorithms, Authentic Marketing, AI in Social Media, Video Content Marketing, Community Building Strategies, Influencer Partnerships, Social Media Analytics, Social Commerce, Customer Experience on Social Media, TikTok Marketing, Instagram Reels Strategy, YouTube Shorts Marketing, Social Media Automation, Real-Time Engagement, User-Generated Content, Social Media Transparency, Data-Driven Marketing, Digital Marketing Trends 2024, ERP for Healthcare Social Media, Behavioral Health EHR Marketing, Retail Inventory Management Systems Marketing', '', '', 1, NULL, '2024-06-01 16:26:25', '2025-12-27 14:07:56'),
(6, 1, 'Web Development', 1, 'Al Mamun', 7, 'How to be Successful in Ecommerce Business?', '<p><b><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">How to be Successful in Ecommerce\nBusiness?</span></b></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">In today\'s digital age, the e-commerce sector is ringing,\npresenting entrepreneurs with impossible opportunities to succeed. Still, the\ncompetition is fierce, and to prosper, you need to employ effective plans. At\nNetigian IT, we specialize in digital marketing and are here to share some\ncrucial tips and tricks to help your e-commerce business succeed.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">1. Choose the Right\nPlatform: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Selecting the right\ne-commerce platform is critical. Platforms like Shopify, WooCommerce, and\nMagento offer different features. Choose one that agrees with your business\nneeds, savings, and technical skills.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">2. Optimize Your Website\nfor Mobile: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">With the majority of users\nshopping via their smartphones, having a mobile-optimized website is\nimperative. Ensure your site is responsive, loads quickly, and provides a\nperfect user experience on all devices.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">3. Invest in High-Quality\nImages and Descriptions: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Your product images and\ndescriptions can create or break a sale. Use high-resolution images and write\ncomprehensive, engaging descriptions that highlight the benefits and features\nof your products.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">4. Utilize SEO Strategies: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Search Engine Optimization (SEO) is vital for lively organic\ntraffic to your site. Use relevant keywords, optimize meta tags, and create\nquality content to improve your search engine ranking.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">5. Leverage Social Media\nMarketing: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social media platforms are\nstrong tools for e-commerce marketing. Create attractive posts, run targeted\nads, and interact with your audience regularly to build a real customer base.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">6. Offer Excellent\nCustomer Service: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Providing unique customer\nservice can set you apart from competitors. Offer mutual contact options,\nrespond promptly to inquiries, and manage complaints professionally to build\ntrust and preserve customers.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">7. Use Analytics to Track\nPerformance: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Regularly examine your\nwebsite’s performance using tools like Google Analytics. Monitor key metrics\nsuch as traffic, conversion rates, and bounce rates to identify areas for\nenhancement and make data-driven opinions.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">8. Optimize the Checkout\nProcess: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">A complicated checkout\nprocess can lead to cart naturalness. Simplify your checkout process by\nreducing the number of steps, offering collaborative payment options, and\nensuring a secure transaction environment.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">9. Encourage Customer\nReviews: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Customer reviews can\ncompletely influence purchasing decisions. Inspire your customers to leave\nreviews by offering motivation and displaying testimonials noticeable on your\nsite.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">10. Run Effective Ad\nCampaigns: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Paid advertising, such as\nGoogle Ads and Facebook Ads, can drive targeted traffic to your site. Set clear\nplans, create conclusive ad content, and always optimize your campaigns for\nbetter results.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">11. Stay Updated with\nTrends: </span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">The e-commerce landscape\nis constantly developing. Stay updated with the latest trends and technologies\nto keep your business competitive. Attend industry conferences, read relevant\nblogs, and network with different professionals.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">By implementing these tips and tricks, you can position your\ne-commerce business for success. At Netigian IT, we are promised to help you\nachieve your digital marketing goals. Contact us today to learn more about how\nwe can support your e-commerce journey.</span></p>', 'In today\'s digital age, the e-commerce sector is ringing, presenting entrepreneurs with impossible opportunities to [..]', 1, 'demo-blog-05.png', 'anonymous', 'how-to-be-successful-in-e-commerce-business', 679, 1, '#EcommerceSuccess, #OnlineBusinessTips, #EcommerceGrowth, #DigitalMarketing, #EcommerceStrategies, #BusinessGrowth, #OnlineSales, #MarketingTips, #Entrepreneurship, #EcommerceTrends, #CustomerEngagement, #SEO, #SocialMediaMarketing, #EcommerceTips, #StartupSuccess', 'Discover the secrets to success in the e-commerce business with our expert tips on digital marketing, customer engagement, SEO, and growth strategies. Learn how to maximize online sales, stay ahead of trends, and grow your online business effectively', '#EcommerceSuccess, #OnlineBusinessTips, #EcommerceGrowth, #DigitalMarketing, #EcommerceStrategies, #BusinessGrowth, #OnlineSales, #MarketingTips, #Entrepreneurship, #EcommerceTrends, #CustomerEngagement, #SEO, #SocialMediaMarketing, #EcommerceTips, #StartupSuccess', 1, NULL, '2024-06-12 15:52:07', '2025-12-25 00:48:13'),
(7, 1, 'Web Development', 1, NULL, NULL, 'Keys to Success in the Restaurant Business', '<p><b><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">Elevating Your Restaurant\nManagement with Netigian IT !</span></b></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At <b>Netigian IT</b>, we\nunderstand that every project is unique, and its success lies in a well-crafted\nprocess customized to your specific needs. Here\'s a glimpse into how we turn\nyour restaurant management vision into reality:</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">1. Initial Consultation:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We start by understanding your restaurant\'s unique\nchallenges and goals. Through in-depth discussions, we collect insights to\nadjust our solutions to your specific needs, assuring we align with your vision\nfrom the very beginning.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">2. Strategic Planning:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our team develops a comprehensive strategy, focusing on\nimproving your restaurant\'s online presence, streamlining operations, and\nimproving customer betrothal. This plan is designed to drive growth and assure\nlong-term success.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">3. Custom Web Development:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We create a user-friendly, visually appealing website that\nshowcases your menu, improves online reservations, and provides excellent\nnavigation. Our web development ensures a strong digital foundation for your\nrestaurant.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">4. Engaging Graphic Design:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our graphic design experts are skilled in attractive\nvisuals, including logos, menus, and promotional materials, that reflect your\nrestaurant\'s brand identity and appeal to your target audience, making an\nongoing impression.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">5. Dynamic Video Editing:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We produce high-quality video matter that highlights your\nrestaurant\'s ambiance, dishes, and unique events. These engaging videos are\nperfect for social media, improving your online presence and attracting new\ncustomers.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">6. Effective Digital\nMarketing:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our digital\nmarketing strategies, including SEO, social media management, and targeted\nadvertising, drive traffic to your website and increase your restaurant\'s\nvisibility, assure you reach a wider audience, and boost suspicions.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">7. Ongoing Support and\nOptimization:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We provide continued\nsupport and watch your restaurant\'s online version, making necessary\nadaptations to optimize results. Our commitment is to help your restaurant\nthrive in an ever-evolving digital topography.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At <b>Netigian IT</b>, we\ndon\'t just deliver projects; we launch transformative expeditions with our\nclients. From concept to completion, we\'re dedicated to unlocking the full\npossible of your restaurant management vision. Ready to take the next step?\nLet\'s make magic together!</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">#NetigianIT #WebDevelopment #GraphicDesign #VideoEditing\n#DigitalMarketing #RestaurantManagement #SuccessJourney\n#TransformationInProgress</span></p>', 'At Netigian IT, we understand that every project is unique, and its success lies in a well-crafted [..]', 1, 'demo-blog-06.png', 'anonymous', 'elevating-your-restaurant-management-with-netigian-it', 691, 1, 'Restaurant management, Netigian IT, restaurant technology, restaurant operations, customer experience, efficiency, restaurant solutions, business transformation, innovative IT solutions, and streamlined operations.', 'Elevate your restaurant management with Netigian IT! Our innovative solutions streamline operations, enhance customer experience, and boost efficiency. Discover how our cutting-edge technology can transform your restaurant business today.', 'Restaurant management, Netigian IT, restaurant technology, restaurant operations, customer experience, efficiency, restaurant solutions, business transformation, innovative IT solutions, and streamlined operations.', 1, NULL, '2024-06-13 04:00:10', '2025-12-27 06:36:46'),
(8, 1, 'Web Development', 1, NULL, NULL, 'How Netigian IT Improves Pharmacy Operations', '<p><b><span style=\"font-size:14pt;font-family:Arial, \'sans-serif\';color:#000000;\">Improving Pharmacy\nManagement with Netigian IT</span></b></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At <b>Netigian IT</b>, we understand\nthat every project is unique, and its success lies in a well-custom-built process\ncustomized to your special needs. Here\'s a look into how we turn your pharmacy\nmanagement vision into reality:</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Needs\nAssessment:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We open by conducting\na thorough necessary assessment to understand the specific requirements and\nexceptions your pharmacy faces. This step ensures that our solutions are\ncustomized to meet your unique needs effectively.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Digital\nTransformation Roadmap:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our\nteam creates a digital transformation roadmap that defines the steps needed to\nupdate your pharmacy\'s operations. This includes incorporating advanced\ntechnologies and streamlining methods for greater effectiveness.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Custom\nWeb Solutions:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We\ndevelop a customized, easy-to-navigate website that highlights your services,\nenables online prescription supplies, and provides needful health information.\nOur goal is to enhance your digital presence and improve customer\naccessibility.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Brand\nDevelopment:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our\ngraphic design experts work on developing a logical brand identity that\nincludes creating logos, promotional materials, and infographics. This helps in\nbuilding a powerful and recognizable brand for your pharmacy.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Interactive\nVideo Content:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We\nproduce attractive video content that displays your pharmacy\'s offerings,\ncustomer testimonials, and health feedback. These videos are designed to boost\nyour online betrothal and build trust with your audience.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Comprehensive\nMarketing Strategy:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our\ndigital marketing route includes SEO optimization, social media campaigns, and\ntargeted online advertisement. This strategy increases your pharmacy\'s\nvisibility and attracts more customers.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Performance\nMonitoring and Support:</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We\nprovide ongoing support and performance monitoring to ensure that your\npharmacy\'s online platforms are operative optimally. We make necessary\nadaptations to improve your digital strategy continually.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At <b>Netigian IT</b>, we don\'t just\ndeliver projects; we launch transformative journeys with our clients. From\nconcept to success, we\'re dedicated to releasing the full potential of your\npharmacy management vision. Ready to take the next step? Let\'s make magic\ntogether!</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">#NetigianIT #WebDevelopment #GraphicDesign\n#VideoEditing #DigitalMarketing #PharmacyManagement #SuccessJourney\n#TransformationInProgress</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"color:#000000;\"> </span></p>', 'At Netigian IT, we understand that every project is unique, and its success lies in a well-custom-built [..]', 1, 'demo-blog-01.png', 'anonymous', 'improving-pharmacy-management-with-netigian-it', 743, 1, '#PharmacyManagement, #NetigianIT, #CustomWebSolutions, #DigitalTransformation, #BrandDevelopment, #InteractiveVideoContent, #DigitalMarketing, #SEOOptimization, #SocialMediaCampaigns, #PerformanceMonitoring, #OnlinePrescriptionServices, #HealthInformation, #GraphicDesign, #CustomerEngagement, #OnlineVisibility, #PharmacyOperations, #TechnologyIntegration, #PharmacySuccess, #TransformativeJourney, #WebDevelopment, #VideoEditing.', 'Transform your pharmacy management with Netigian IT\'s custom digital solutions, including web development, branding, and comprehensive marketing strategies to enhance your online presence and customer engagement.', '#PharmacyManagement, #NetigianIT, #CustomWebSolutions, #DigitalTransformation, #BrandDevelopment, #InteractiveVideoContent, #DigitalMarketing, #SEOOptimization, #SocialMediaCampaigns, #PerformanceMonitoring, #OnlinePrescriptionServices, #HealthInformation, #GraphicDesign, #CustomerEngagement, #OnlineVisibility, #PharmacyOperations, #TechnologyIntegration, #PharmacySuccess, #TransformativeJourney, #WebDevelopment, #VideoEditing.', 1, NULL, '2024-06-15 14:25:01', '2026-08-21 07:30:32'),
(9, 4, 'ওয়েব ডেভেলপমেন্ট', 8, 'Netigian IT', 1, 'কিভাবে নেটিজিয়ান আইটি ফার্মেসি অপারেশন উন্নত করে', '<p><b>নেটিজিয়ান আইটি দ্বারা ফার্মেসি ব্যবস্থাপনা উন্নয়ন</b></p><p>নেটিজিয়ান আইটিতে আমরা বিশ্বাস করি প্রতিটি প্রকল্পই আলাদা, এবং এর সফলতা নির্ভর করে কাস্টমাইজড প্রক্রিয়ার উপর, যা আপনার বিশেষ প্রয়োজন অনুযায়ী তৈরি করা হয়। চলুন দেখি কীভাবে আমরা আপনার ফার্মেসি ব্যবস্থাপনা ভিশনকে বাস্তবে রূপান্তর করি:</p><p><b>প্রয়োজনীয়তা মূল্যায়ন:</b> আমরা একটি সম্পূর্ণ প্রয়োজনীয়তা মূল্যায়ন করি যাতে আপনার ফার্মেসির বিশেষ প্রয়োজন ও চ্যালেঞ্জগুলো ভালোভাবে বুঝতে পারি। এই ধাপটি নিশ্চিত করে যে আমাদের সমাধানগুলো আপনার বিশেষ প্রয়োজনগুলো কার্যকরভাবে পূরণ করতে পারে।</p><p><b>ডিজিটাল রূপান্তর রোডম্যাপ:</b> আমাদের দল একটি ডিজিটাল রূপান্তর রোডম্যাপ তৈরি করে যা আপনার ফার্মেসির কার্যক্রম আধুনিকীকরণ করতে প্রয়োজনীয় ধাপগুলো নির্ধারণ করে। এর মাধ্যমে উন্নত প্রযুক্তি সংযোজন ও কর্মপ্রবাহের সরলীকরণ করা হয় যাতে কার্যকারিতা বাড়ে।</p><p><b>কাস্টম ওয়েব সমাধান: </b>আমরা একটি কাস্টমাইজড, সহজে নেভিগেট করা যায় এমন ওয়েবসাইট তৈরি করি যা আপনার সেবাগুলো তুলে ধরে, অনলাইন প্রেসক্রিপশন সরবরাহের সুযোগ দেয় এবং প্রয়োজনীয় স্বাস্থ্য তথ্য প্রদান করে। আমাদের লক্ষ্য হলো আপনার ডিজিটাল উপস্থিতি বৃদ্ধি করা এবং গ্রাহকের জন্য সহজলভ্যতা বাড়ানো।</p><p><b>ব্র্যান্ড উন্নয়ন:</b> আমাদের গ্রাফিক ডিজাইন বিশেষজ্ঞরা একটি যৌক্তিক ব্র্যান্ড আইডেন্টিটি তৈরি করেন, যাতে লোগো, প্রচারণামূলক উপকরণ এবং ইনফোগ্রাফিক তৈরি অন্তর্ভুক্ত থাকে। এটি আপনার ফার্মেসির জন্য একটি শক্তিশালী এবং স্বীকৃত ব্র্যান্ড গড়ে তুলতে সহায়ক হয়।</p><p><b>ইন্টারেক্টিভ ভিডিও কন্টেন্ট:</b> আমরা আকর্ষণীয় ভিডিও কন্টেন্ট তৈরি করি যা আপনার ফার্মেসির সেবা, গ্রাহকদের পর্যালোচনা এবং স্বাস্থ্য তথ্য তুলে ধরে। এই ভিডিওগুলো আপনার অনলাইন উপস্থিতি বাড়াতে এবং দর্শকদের আস্থা অর্জন করতে সহায়ক হয়।</p><p><b>সমগ্র মার্কেটিং কৌশল:</b> আমাদের ডিজিটাল মার্কেটিং পদ্ধতিতে SEO অপটিমাইজেশন, সোশ্যাল মিডিয়া ক্যাম্পেইন এবং লক্ষ্যমুখী অনলাইন বিজ্ঞাপন অন্তর্ভুক্ত রয়েছে। এই কৌশল আপনার ফার্মেসির দৃশ্যমানতা বাড়ায় এবং আরও গ্রাহক আকর্ষণ করে।</p><p><b>পারফরম্যান্স মনিটরিং এবং সাপোর্ট:</b> আমরা অব্যাহত সহায়তা ও পারফরম্যান্স মনিটরিং প্রদান করি, যাতে আপনার ফার্মেসির অনলাইন প্ল্যাটফর্মগুলো সর্বোচ্চ কার্যক্ষমতায় থাকে। আমরা আপনার ডিজিটাল কৌশলটি আরও উন্নত করতে প্রয়োজনীয় পরিবর্তনগুলো করি।</p><p>নেটিজিয়ান আইটিতে আমরা শুধু প্রকল্প সরবরাহ করি না; আমরা আমাদের ক্লায়েন্টদের সাথে রূপান্তরমূলক যাত্রা শুরু করি। কনসেপ্ট থেকে সফলতা পর্যন্ত, আমরা আপনার ফার্মেসি ব্যবস্থাপনা ভিশনের পূর্ণ সম্ভাবনা উন্মোচনে নিবেদিত। পরবর্তী ধাপে এগিয়ে যেতে প্রস্তুত? আসুন একসাথে জাদু সৃষ্টি করি!</p>', 'নেটিজিয়ান আইটিতে আমরা বিশ্বাস করি প্রতিটি প্রকল্পই আলাদা, এবং এর সফলতা নির্ভর করে কাস্টমাইজড প্রক্রিয়ার উপর...', 1, 'demo-blog-01.png', 'with_this_account', 'how-netigian-it-improves-pharmacy-operation', 14, 1, '', '', '', 0, NULL, '2024-11-02 18:41:24', '2025-12-14 00:41:45'),
(10, 4, 'ওয়েব ডেভেলপমেন্ট', 8, 'Netigian IT', 1, 'রেস্তোরাঁ ব্যবসায় সাফল্যের চাবিকাঠি', '<p>নেটিজিয়ান আইটি দ্বারা আপনার রেস্টুরেন্ট ব্যবস্থাপনা উন্নয়ন!</p><p>নেটিজিয়ান আইটিতে আমরা বুঝি যে প্রতিটি প্রকল্পই আলাদা, এবং এর সফলতা নির্ভর করে কাস্টমাইজড প্রক্রিয়ার উপর, যা আপনার নির্দিষ্ট চাহিদা অনুযায়ী তৈরি করা হয়। </p><p><br></p><p>চলুন দেখি কীভাবে আমরা আপনার রেস্টুরেন্ট ব্যবস্থাপনা ভিশনকে বাস্তবে রূপান্তর করি:</p><ol><li><p>প্রাথমিক পরামর্শ: আমরা আপনার রেস্টুরেন্টের বিশেষ চ্যালেঞ্জ ও লক্ষ্যের কথা বুঝতে আলোচনা শুরু করি। গভীর আলাপচারিতার মাধ্যমে আমরা এমন তথ্য সংগ্রহ করি যা আমাদের সমাধানগুলোকে আপনার বিশেষ চাহিদা অনুযায়ী সাজাতে সহায়ক, এবং শুরু থেকেই আপনার ভিশনের সাথে সামঞ্জস্য রক্ষা করে।</p></li><li><p>কৌশলগত পরিকল্পনা: আমাদের দল একটি ব্যাপক কৌশল তৈরি করে যা আপনার রেস্টুরেন্টের অনলাইন উপস্থিতি উন্নত করতে, অপারেশনকে সরলীকরণ করতে এবং গ্রাহক সম্পর্ক উন্নয়নে ফোকাস করে। এই পরিকল্পনা দীর্ঘমেয়াদী সফলতা ও প্রবৃদ্ধি নিশ্চিত করার জন্য তৈরি।</p></li><li><p>কাস্টম ওয়েব ডেভেলপমেন্ট: আমরা একটি ব্যবহারবান্ধব, দৃষ্টিনন্দন ওয়েবসাইট তৈরি করি যা আপনার মেনু প্রদর্শন করে, অনলাইন রিজার্ভেশনকে উন্নত করে এবং অসাধারণ নেভিগেশন প্রদান করে। আমাদের ওয়েব ডেভেলপমেন্ট আপনার রেস্টুরেন্টের জন্য শক্তিশালী একটি ডিজিটাল ভিত্তি নিশ্চিত করে।</p></li><li><p>আকর্ষণীয় গ্রাফিক ডিজাইন: আমাদের গ্রাফিক ডিজাইন বিশেষজ্ঞরা লোগো, মেনু, ও প্রচারণামূলক উপকরণসহ আকর্ষণীয় ভিজ্যুয়াল তৈরি করেন যা আপনার রেস্টুরেন্টের ব্র্যান্ড পরিচয় ফুটিয়ে তোলে এবং লক্ষ্য গ্রাহকদের মুগ্ধ করে।</p></li><li><p>গতিশীল ভিডিও এডিটিং: আমরা উচ্চমানের ভিডিও তৈরি করি যা আপনার রেস্টুরেন্টের পরিবেশ, খাবার এবং বিশেষ ইভেন্টগুলোকে তুলে ধরে। এই আকর্ষণীয় ভিডিওগুলো সোশ্যাল মিডিয়ার জন্য উপযুক্ত, যা আপনার অনলাইন উপস্থিতি বাড়াতে এবং নতুন গ্রাহকদের আকর্ষণ করতে সহায়ক।</p></li><li><p>কার্যকরী ডিজিটাল মার্কেটিং: আমাদের ডিজিটাল মার্কেটিং কৌশল, যেমন SEO, সোশ্যাল মিডিয়া ব্যবস্থাপনা এবং লক্ষ্যমুখী বিজ্ঞাপন, আপনার ওয়েবসাইটে ট্রাফিক নিয়ে আসে এবং আপনার রেস্টুরেন্টের দৃশ্যমানতা বাড়ায়, আপনাকে আরও বিস্তৃত দর্শকদের কাছে পৌঁছাতে ও ব্যবসার প্রসারে সহায়তা করে।</p></li><li><p>অব্যাহত সহায়তা ও অপটিমাইজেশন: আমরা আপনার রেস্টুরেন্টের অনলাইন কার্যকারিতা পর্যবেক্ষণ করে চলমান সহায়তা প্রদান করি এবং ফলাফল উন্নত করার জন্য প্রয়োজনীয় পরিবর্তন করি। আমাদের লক্ষ্য আপনার রেস্টুরেন্টকে ক্রমাগত পরিবর্তনশীল ডিজিটাল পরিবেশে সফল হতে সহায়তা করা।</p><p><br></p></li></ol><p>নেটিজিয়ান আইটিতে আমরা শুধু প্রকল্প সরবরাহ করি না; আমরা আমাদের ক্লায়েন্টদের সাথে রূপান্তরমূলক অভিযাত্রা শুরু করি। কনসেপ্ট থেকে সম্পূর্ণতা পর্যন্ত, আমরা আপনার রেস্টুরেন্ট ব্যবস্থাপনা ভিশনের পূর্ণ সম্ভাবনা উন্মোচনে নিবেদিত। পরবর্তী ধাপে এগিয়ে যেতে প্রস্তুত? আসুন একসাথে জাদু সৃষ্টি করি!</p>', 'নেটিজিয়ান আইটিতে আমরা বুঝি যে প্রতিটি প্রকল্পই আলাদা, এবং এর সফলতা নির্ভর করে কাস্টমাইজড প্রক্রিয়ার উপর, যা আপনার নির্দিষ্ট ...', 1, 'demo-blog-02.png', 'with_this_account', 'keys-to-success-in-the-restaurant-business', 11, 1, '', '', '', 0, NULL, '2024-11-02 18:46:34', '2025-12-15 16:32:55');
INSERT INTO `blogs` (`id`, `language_id`, `category_name`, `category_id`, `author_name`, `user_id`, `title`, `desc`, `short_desc`, `image_status`, `blog_image`, `type`, `slug`, `view`, `status`, `tag`, `meta_desc`, `meta_keyword`, `breadcrumb_status`, `custom_breadcrumb_image`, `created_at`, `updated_at`) VALUES
(11, 4, 'ওয়েব ডেভেলপমেন্ট', 8, 'Netigian IT', 1, 'কিভাবে ইকমার্স ব্যবসায় সফল হবেন?', '<p><b>ই-কমার্স ব্যবসায় সফল হওয়ার কৌশল</b></p><p>আজকের ডিজিটাল যুগে, ই-কমার্স খাত দ্রুত বিস্তৃত হচ্ছে, যা উদ্যোক্তাদের জন্য অসাধারণ সুযোগ নিয়ে এসেছে। তবে, প্রতিযোগিতা তীব্র এবং সফল হতে হলে কার্যকর কৌশল প্রয়োগ করতে হবে। </p><p><br></p><p>নেটিজিয়ান আইটিতে আমরা ডিজিটাল মার্কেটিংয়ে বিশেষজ্ঞ এবং আপনার ই-কমার্স ব্যবসায় সফল হতে সাহায্য করার জন্য কিছু গুরুত্বপূর্ণ টিপস ও কৌশল শেয়ার করছি।</p><ol><li><p><b>সঠিক প্ল্যাটফর্ম নির্বাচন করুন:</b> সঠিক ই-কমার্স প্ল্যাটফর্ম নির্বাচন অত্যন্ত গুরুত্বপূর্ণ। Shopify, WooCommerce এবং Magento এর মতো প্ল্যাটফর্মে বিভিন্ন ফিচার পাওয়া যায়। আপনার ব্যবসার চাহিদা, বাজেট এবং টেকনিক্যাল দক্ষতার সাথে সামঞ্জস্যপূর্ণ একটি প্ল্যাটফর্ম বেছে নিন।</p></li><li><p><b>মোবাইলের জন্য ওয়েবসাইট অপ্টিমাইজ করুন:</b> বেশিরভাগ ব্যবহারকারী মোবাইলের মাধ্যমে কেনাকাটা করে, তাই একটি মোবাইল-অপ্টিমাইজড ওয়েবসাইট থাকা অপরিহার্য। নিশ্চিত করুন যে আপনার সাইটটি রেসপন্সিভ, দ্রুত লোড হয় এবং সকল ডিভাইসে উন্নত ব্যবহারকারীর অভিজ্ঞতা প্রদান করে।</p></li><li><p><b>উচ্চমানের ছবি ও বিবরণ ব্যবহার করুন: </b>আপনার পণ্যের ছবি ও বিবরণ বিক্রয়কে প্রভাবিত করতে পারে। উচ্চ রেজোলিউশনের ছবি ব্যবহার করুন এবং পণ্যের সুবিধা ও বৈশিষ্ট্যগুলি তুলে ধরে আকর্ষণীয় বিবরণ লিখুন।</p></li><li><p><b>এসইও কৌশল প্রয়োগ করুন: </b>সার্চ ইঞ্জিন অপ্টিমাইজেশন (SEO) সাইটে অর্গানিক ট্রাফিক আনতে গুরুত্বপূর্ণ। প্রাসঙ্গিক কীওয়ার্ড ব্যবহার করুন, মেটা ট্যাগ অপ্টিমাইজ করুন এবং গুণগত কন্টেন্ট তৈরি করুন যাতে সার্চ ইঞ্জিনে র‌্যাঙ্ক বৃদ্ধি পায়।</p></li><li><p><b>সোশ্যাল মিডিয়া মার্কেটিং কাজে লাগান:</b> সোশ্যাল মিডিয়া প্ল্যাটফর্ম ই-কমার্স মার্কেটিংয়ের শক্তিশালী হাতিয়ার। আকর্ষণীয় পোস্ট তৈরি করুন, টার্গেটেড বিজ্ঞাপন চালান এবং নিয়মিত আপনার শ্রোতার সাথে যোগাযোগ করুন যাতে একটি বিশ্বস্ত গ্রাহক বেস গড়ে তোলা যায়।</p></li><li><p><b>চমৎকার গ্রাহক সেবা প্রদান করুন:</b> অনন্য গ্রাহক সেবা প্রদান করলে প্রতিযোগীদের থেকে নিজেকে আলাদা করা যায়। বিভিন্ন যোগাযোগ মাধ্যম অফার করুন, প্রশ্নের দ্রুত উত্তর দিন এবং পেশাদারভাবে অভিযোগ পরিচালনা করুন যাতে বিশ্বাস স্থাপন ও গ্রাহক ধরে রাখা যায়।</p></li><li><p><b>পারফরম্যান্স ট্র্যাক করতে অ্যানালিটিক্স ব্যবহার করুন: </b>নিয়মিত আপনার ওয়েবসাইটের পারফরম্যান্স বিশ্লেষণ করতে Google Analytics এর মতো টুল ব্যবহার করুন। ট্রাফিক, কনভার্শন রেট এবং বাউন্স রেটের মতো গুরুত্বপূর্ণ মেট্রিক পর্যবেক্ষণ করুন যাতে উন্নতির সুযোগগুলো চিহ্নিত করা যায়।</p></li><li><p><b>চেকআউট প্রক্রিয়া সহজ করুন: </b>জটিল চেকআউট প্রক্রিয়ায় কার্ট পরিত্যাগ বাড়তে পারে। চেকআউট প্রক্রিয়াটি সহজ করতে ধাপ সংখ্যা কমিয়ে ফেলুন, বিভিন্ন পেমেন্ট অপশন অফার করুন এবং সুরক্ষিত লেনদেন পরিবেশ নিশ্চিত করুন।</p></li><li><p><b>গ্রাহক পর্যালোচনা উত্সাহিত করুন:</b> গ্রাহক পর্যালোচনা কেনাকাটার সিদ্ধান্তকে ইতিবাচকভাবে প্রভাবিত করতে পারে। উৎসাহ প্রদান করুন যাতে গ্রাহকরা রিভিউ দেন এবং সাইটে সহজেই প্রদর্শিত টেস্টিমোনিয়ালগুলো দেখান।</p></li><li><p><b>কার্যকর বিজ্ঞাপন ক্যাম্পেইন চালান:</b> Google Ads এবং Facebook Ads এর মতো পেইড বিজ্ঞাপন আপনার সাইটে টার্গেটেড ট্রাফিক আনতে পারে। স্পষ্ট লক্ষ্য নির্ধারণ করুন, মনোযোগ আকর্ষণকারী বিজ্ঞাপন তৈরি করুন এবং সর্বদা আপনার ক্যাম্পেইনগুলোকে আরও ভাল ফলাফলের জন্য অপ্টিমাইজ করুন।</p></li><li><p><b>ট্রেন্ড সম্পর্কে আপডেট থাকুন:</b> ই-কমার্স খাত নিয়মিত পরিবর্তিত হয়। সর্বশেষ ট্রেন্ড এবং প্রযুক্তি সম্পর্কে আপডেট থাকুন যাতে আপনার ব্যবসা প্রতিযোগিতামূলক থাকে। ইন্ডাস্ট্রি কনফারেন্সে অংশ নিন, প্রাসঙ্গিক ব্লগ পড়ুন এবং অন্যান্য পেশাজীবীদের সাথে নেটওয়ার্ক তৈরি করুন।</p><p><br></p></li></ol><p>এই টিপস এবং কৌশলগুলি প্রয়োগ করে আপনি আপনার ই-কমার্স ব্যবসাকে সফলতার দিকে এগিয়ে নিতে পারবেন। নেটিজিয়ান আইটিতে আমরা আপনার ডিজিটাল মার্কেটিং লক্ষ্য পূরণে প্রতিশ্রুতিবদ্ধ। ই-কমার্স যাত্রায় আমাদের সাহায্য পেতে আজই আমাদের সাথে যোগাযোগ করুন।</p>', 'আজকের ডিজিটাল যুগে, ই-কমার্স খাত দ্রুত বিস্তৃত হচ্ছে, যা উদ্যোক্তাদের জন্য অসাধারণ সুযোগ নিয়ে এসেছে। তবে, প্রতিযোগিতা তীব্র এবং সফল হতে হলে কার্যকর কৌশল প্রয়োগ...', 1, 'demo-blog-03.png', 'with_this_account', 'how-to-be-successful-in-ecommerce-business', 17, 1, '', '', '', 0, NULL, '2024-11-02 19:04:23', '2025-12-15 00:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_background_images`
--

CREATE TABLE `blog_background_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1,
  `blog_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_paginates`
--

CREATE TABLE `blog_paginates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `homepage_item` int(11) NOT NULL DEFAULT 6,
  `grid_view_paginate` int(11) NOT NULL DEFAULT 9,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_sections`
--

CREATE TABLE `blog_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_sections`
--

INSERT INTO `blog_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blogs', 'Our Blogs', '2024-02-13 16:54:20', '2024-02-13 16:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `breadcrumbs`
--

CREATE TABLE `breadcrumbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `breadcrumb_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breadcrumbs`
--

INSERT INTO `breadcrumbs` (`id`, `breadcrumb_image`, `created_at`, `updated_at`) VALUES
(1, '1719076387-asdfasdf.jpg', '2024-02-08 18:13:23', '2024-06-22 17:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `category_slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `language_id`, `category_name`, `order`, `status`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 0, 1, 'web-development', '2024-02-13 16:53:12', '2024-02-13 16:53:12'),
(2, 1, 'Digital Marketing', 1, 1, 'digital-marketing', '2024-02-13 16:53:20', '2024-02-13 16:53:20'),
(3, 1, 'Video Editing', 2, 1, 'video-editing', '2024-02-13 16:53:28', '2024-02-13 16:53:28'),
(4, 1, 'Email Marketing', 3, 1, 'email-marketing', '2024-02-18 15:29:17', '2024-02-18 15:29:28'),
(5, 1, 'Web Design', 4, 1, 'web-design', '2024-02-18 15:29:49', '2024-02-18 15:29:49'),
(6, 1, 'Facebook Ad Campign', 5, 1, 'facebook-ad-campign', '2024-02-18 15:30:12', '2024-02-18 15:30:12'),
(7, 1, 'Search Engine Optimization', 6, 1, 'search-engine-optimization', '2024-02-18 15:31:02', '2024-02-18 15:31:02'),
(8, 4, 'ওয়েব ডেভেলপমেন্ট', 0, 1, '', '2024-11-02 18:39:11', '2024-11-02 18:39:11'),
(9, 4, 'ডিজিটাল মার্কেটিং', 0, 1, '-2', '2024-11-02 18:39:23', '2024-11-02 18:39:23'),
(10, 4, 'ভিডিও এডিটিং', 0, 1, '-3', '2024-11-02 18:39:30', '2024-11-02 18:39:30'),
(11, 4, 'গ্রাফিক্স ডিজাইন', 0, 1, '-4', '2024-11-02 18:39:42', '2024-11-02 18:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `color_options`
--

CREATE TABLE `color_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_option` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_options`
--

INSERT INTO `color_options` (`id`, `color_option`, `created_at`, `updated_at`) VALUES
(1, 4, '2024-02-07 18:04:36', '2024-03-13 05:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `comment` text NOT NULL,
  `approval` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `email`, `comment`, `approval`, `created_at`, `updated_at`) VALUES
(2, 4, 'https://lvivforum.Pp.ua/', 'gretta.withnell24@letstalk.scamperly.click', 'Everyone loves it when folks get together and share ideas.\r\nGreat site, stick with it! https://lvivforum.Pp.ua/', '0', '2024-10-24 03:41:39', '2024-10-24 03:41:39'),
(3, 4, 'https://lvivforum.Pp.ua/', 'gretta.withnell24@letstalk.scamperly.click', 'Everyone loves itt when folks get together and share ideas.\r\nGreat site, stick with it! https://lvivforum.Pp.ua/', '0', '2024-10-24 03:42:00', '2024-10-24 03:42:00'),
(4, 7, '* * * $3,222 payment available! Confirm your transfer here: https://botlabs.agency/index.php?dy01c8 * * * hs=0dee6006c29abdaeff5f25ae12fb3dfa* ххх*', 'paouqua@mailbox.in.ua', 'durs2y', '0', '2025-11-19 02:18:53', '2025-11-19 02:18:53'),
(5, 7, '* * * <a href=\"https://botlabs.agency/index.php?dy01c8\">$3,222 deposit available</a> * * * hs=0dee6006c29abdaeff5f25ae12fb3dfa* ххх*', 'paouqua@mailbox.in.ua', 'durs2y', '0', '2025-11-19 02:18:55', '2025-11-19 02:18:55'),
(6, 6, '* * * $3,222 payment available! Confirm your transfer here: http://www.uwiapartment.com/index.php?3vgmhr * * * hs=f9063cf053d48b85dd3f72a4fb554095* ххх*', 'paouqua@mailbox.in.ua', '3qgm8n', '0', '2025-11-19 02:18:59', '2025-11-19 02:18:59'),
(7, 6, '* * * <a href=\"http://www.uwiapartment.com/index.php?3vgmhr\">$3,222 credit available</a> * * * hs=f9063cf053d48b85dd3f72a4fb554095* ххх*', 'paouqua@mailbox.in.ua', '3qgm8n', '0', '2025-11-19 02:19:03', '2025-11-19 02:19:03'),
(8, 3, '* * * $3,222 deposit available! Confirm your transaction here: http://politecnicodelasamericas.com/index.php?6g4zbj * * * hs=b6ee12feeeae1a5e94c45fa73dc67fdd* ххх*', 'paouqua@mailbox.in.ua', 'sdv7i9', '0', '2025-11-19 02:19:09', '2025-11-19 02:19:09'),
(9, 3, '* * * <a href=\"http://politecnicodelasamericas.com/index.php?6g4zbj\">$3,222 deposit available</a> * * * hs=b6ee12feeeae1a5e94c45fa73dc67fdd* ххх*', 'paouqua@mailbox.in.ua', 'sdv7i9', '0', '2025-11-19 02:19:14', '2025-11-19 02:19:14'),
(10, 8, '* * * $3,222 payment available! Confirm your operation here: http://www.uwiapartment.com/index.php?hx2s5w * * * hs=1572833a7d33fd4bea0f45d03b4b90fd* ххх*', 'paouqua@mailbox.in.ua', 'cof1cq', '0', '2025-11-19 02:19:23', '2025-11-19 02:19:23'),
(11, 8, '* * * <a href=\"http://www.uwiapartment.com/index.php?hx2s5w\">$3,222 payment available</a> * * * hs=1572833a7d33fd4bea0f45d03b4b90fd* ххх*', 'paouqua@mailbox.in.ua', 'cof1cq', '0', '2025-11-19 02:19:30', '2025-11-19 02:19:30'),
(12, 5, '* * * $3,222 payment available! Confirm your operation here: http://politecnicodelasamericas.com/index.php?upxdd1 * * * hs=1554fc0c44e8af0d21cbe1ec0eb26951* ххх*', 'paouqua@mailbox.in.ua', 'mbr3b2', '0', '2025-11-19 02:19:34', '2025-11-19 02:19:34'),
(13, 5, '* * * <a href=\"http://politecnicodelasamericas.com/index.php?upxdd1\">$3,222 credit available</a> * * * hs=1554fc0c44e8af0d21cbe1ec0eb26951* ххх*', 'paouqua@mailbox.in.ua', 'mbr3b2', '0', '2025-11-19 02:19:37', '2025-11-19 02:19:37'),
(14, 4, '* * * $3,222 credit available! Confirm your transfer here: https://somaarttattoo.ru/index.php?k8q010 * * * hs=e68658be1952ce90ffc837d1d2e2e0b5* ххх*', 'paouqua@mailbox.in.ua', 'x8de90', '0', '2025-11-19 02:19:41', '2025-11-19 02:19:41'),
(15, 4, '* * * <a href=\"https://somaarttattoo.ru/index.php?k8q010\">$3,222 deposit available</a> * * * hs=e68658be1952ce90ffc837d1d2e2e0b5* ххх*', 'paouqua@mailbox.in.ua', 'x8de90', '1', '2025-11-19 02:19:49', '2026-08-15 09:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `language_id`, `icon`, `title`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'fas fa-map-marker-alt', 'Address', 'Sonadanga, Khulna, Bangladesh', 0, '2024-02-13 10:41:50', '2026-08-15 09:02:01'),
(3, 1, 'fas fa-envelope-open', 'Contact Us Today', 'contact@netigianit.com', 1, '2024-02-13 10:50:25', '2024-03-16 01:02:18'),
(5, 4, 'fas fa-location-arrow', 'ঠিকানা', 'H-83, R-13, সোনাডাঙ্গা আর/এ, খুলনা, বাংলাদেশ', 0, '2024-11-02 14:11:09', '2024-11-02 14:11:09'),
(6, 4, 'fab fa-whatsapp', 'হোয়াটসএপ করুন', '০১৭৭০৩৪৫৫১৮', 0, '2024-11-02 14:11:58', '2024-11-02 14:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_sections`
--

CREATE TABLE `contact_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `map_iframe` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_sections`
--

INSERT INTO `contact_sections` (`id`, `language_id`, `section_title`, `title`, `map_iframe`, `created_at`, `updated_at`) VALUES
(1, 1, 'Contact Us', 'Contact Us', '', '2024-02-13 10:41:12', '2024-03-12 01:07:31'),
(2, 4, 'যোগাযোগ', 'আমাদের সাথে যোগাযোগ করুন', '', '2024-11-02 14:10:24', '2024-11-02 14:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `timer` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `language_id`, `timer`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 36, 'Happy Clients', 0, '2024-02-08 17:10:46', '2025-11-02 16:25:34'),
(2, 1, 48, 'Project Completed', 1, '2024-02-08 17:39:40', '2025-11-02 16:25:12'),
(3, 1, 21, 'Cups Of Coffee', 2, '2024-02-08 17:40:26', '2024-10-23 09:38:45'),
(4, 4, 22, 'হ্যাপি ক্লায়েন্টস', 0, '2024-11-02 14:01:55', '2024-11-02 14:01:55'),
(5, 4, 28, 'প্রজেক্ট কমপ্লিট', 0, '2024-11-02 14:02:25', '2024-11-02 14:02:25'),
(6, 4, 21, 'কাপস অফ কফি', 0, '2024-11-02 14:02:48', '2024-11-02 14:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `counter_sections`
--

CREATE TABLE `counter_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter_sections`
--

INSERT INTO `counter_sections` (`id`, `language_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'More than 100+ customers trusted US', '2024-02-08 17:11:18', '2025-11-02 16:24:56'),
(2, 4, '৬০+ এর বেশি গ্রাহকরা আমাদের বিশ্বস্ত', '2024-11-02 14:01:33', '2024-11-02 14:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('icon','image') NOT NULL,
  `feature_image` text DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `desc` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `stack` varchar(20) NOT NULL DEFAULT 'supporting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `language_id`, `type`, `feature_image`, `icon`, `title`, `desc`, `order`, `stack`, `created_at`, `updated_at`) VALUES
(2, 1, 'icon', NULL, NULL, 'Laravel', 'Secure Laravel backends, admin panels, and business web apps built for scalability and maintainability.', 0, 'main', '2024-02-13 17:46:51', '2026-08-18 09:51:39'),
(3, 1, 'icon', NULL, NULL, 'Vue.js', 'Fast Vue.js frontends with reusable components, smooth interactions, and clean interface architecture.', 1, 'main', '2024-02-13 17:49:01', '2026-08-18 09:51:39'),
(4, 1, 'icon', NULL, NULL, 'PHP', 'Custom PHP development for websites, APIs, and server-side logic with stable, production-ready code.', 2, 'main', '2024-02-27 02:10:10', '2026-08-18 09:51:39'),
(5, 1, 'icon', NULL, NULL, 'Node.js', 'Node.js APIs and real-time services for modern full-stack web products and integrations.', 4, 'main', '2024-02-27 02:10:57', '2026-08-18 09:51:39'),
(6, 1, 'icon', NULL, NULL, 'MySQL', 'Optimized MySQL database design for secure storage, efficient queries, and scalable web applications.', 5, 'main', '2024-02-27 02:11:43', '2026-08-18 09:51:39'),
(7, 1, 'icon', NULL, NULL, 'React.js', 'React.js dashboards and web interfaces with modular components, responsive layouts, and smooth user flows.', 6, 'main', '2024-02-27 02:12:27', '2026-08-18 09:51:39'),
(8, 4, 'icon', NULL, 'fas fa-anchor', 'বিজনেস স্ট্রাটেজি', 'শুধুমাত্র তত্ত্বে থাকার জন্য নয়, বাস্তবে প্রয়োগ করার জন্য একটি কৌশলের জন্য একটি স্পষ্ট দৃষ্টি এবং দৃঢ় সংকল্প প্রয়োজন।', 0, 'main', '2024-11-02 12:26:43', '2026-08-18 09:32:40'),
(9, 4, 'icon', NULL, 'fas fa-tv', 'ওয়েবসাইট ডেভেলপমেন্ট', 'ক্লায়েন্টের প্রয়োজন অনুসারে তৈরি দৃশ্যত আকর্ষণীয় এবং ব্যবহারকারী-বান্ধব ওয়েবসাইট তৈরি করা। বিভিন্ন ডিভাইস জুড়ে সামঞ্জস্য নিশ্চিত করতে প্রতিক্রিয়াশীল ডিজাইন।', 0, 'main', '2024-11-02 12:27:53', '2026-08-18 09:32:40'),
(10, 4, 'icon', NULL, 'fas fa-blender', 'মার্কেটিং এন্ড রিপোর্ট', 'মার্কেটিং রিপোর্টিং হল অগ্রগতি পরিমাপ করার প্রক্রিয়া, মান দেখানো এবং বিপণন কর্মক্ষমতা উন্নত করতে এবং আপনার লক্ষ্য পূরণের জন্য কার্যকর পদক্ষেপগুলি চিহ্নিত করা।', 0, 'main', '2024-11-02 12:28:54', '2026-08-18 09:32:40'),
(11, 4, 'icon', NULL, 'fab fa-facebook-f', 'সোস্যাল মিডিয়া ম্যানেজমেন্ট', 'ব্যবসার জন্য সামাজিক মিডিয়া প্রোফাইল তৈরি এবং পরিচালনা করা। সোশ্যাল মিডিয়ার কৌশল তৈরি করা, বিষয়বস্তু পোস্ট করা এবং দর্শকদের সাথে আকর্ষিত হওয়া।', 0, 'main', '2024-11-02 12:31:59', '2026-08-18 09:32:40'),
(12, 4, 'icon', NULL, 'fas fa-ad', 'ডিজিটাল মার্কেটিং', 'অনলাইন মার্কেটিং প্রচারাভিযান চালানো, যার মধ্যে পে-পার-ক্লিক (PPC) বিজ্ঞাপন এবং ইমেল মার্কেটিং। বিপণন প্রচেষ্টার কার্যকারিতা পরিমাপ করার জন্য বিশ্লেষণ এবং প্রতিবেদন।', 0, 'main', '2024-11-02 12:32:57', '2026-08-18 09:32:40'),
(13, 4, 'icon', NULL, 'fas fa-video', 'ভিডিও এডিটিং সার্ভিসেস', 'ক্লায়েন্ট চাহিদার বিস্তৃত পরিসর মেটাতে উন্নত ভিডিও সম্পাদনা ক্ষমতা। ভিডিও পোস্ট-প্রোডাকশনের জন্য শিল্প-মানের সফ্টওয়্যার ব্যবহারে দক্ষ সম্পাদকরা।', 0, 'main', '2024-11-02 12:33:41', '2026-08-18 09:32:40'),
(14, 1, 'icon', NULL, NULL, 'Redis', 'In-memory caching and queues for faster APIs and real-time performance.', 10, 'supporting', '2026-08-18 08:11:56', '2026-08-18 09:51:39'),
(17, 1, 'icon', NULL, NULL, 'Deploy', 'Cloud and VPS deployment with Docker and zero-downtime strategy.', 13, 'supporting', '2026-08-18 08:11:56', '2026-08-18 09:51:39'),
(18, 1, 'icon', NULL, NULL, 'Cursor', 'AI-assisted development workflow for faster coding and debugging.', 14, 'supporting', '2026-08-18 08:11:56', '2026-08-18 09:51:39'),
(19, 1, 'icon', NULL, NULL, 'PrimeVue', 'Vue UI component library for dashboards, forms, and rich admin interfaces.', 15, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(20, 1, 'icon', NULL, NULL, 'PrimeReact', 'React UI component library for production-ready dashboards and app layouts.', 16, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(21, 1, 'icon', NULL, NULL, 'Nuxt.js', 'Vue meta-framework for SSR, routing, and high-performance web apps.', 7, 'main', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(22, 1, 'icon', NULL, NULL, 'Next.js', 'React framework for SSR, routing, and scalable production frontends.', 18, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(23, 1, 'icon', NULL, NULL, 'Zustand', 'Lightweight React state management with a simple, scalable store API.', 19, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(24, 1, 'icon', NULL, NULL, 'Redux', 'Predictable React state container for complex application data flows.', 20, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(25, 1, 'icon', NULL, NULL, 'Vuex', 'Centralized state management for Vue applications and shared data.', 8, 'main', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(26, 1, 'icon', NULL, NULL, 'Pinia', 'Modern Vue store for typed, modular, and maintainable state.', 22, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(27, 4, 'icon', NULL, NULL, 'Redis', 'In-memory caching and queues for faster APIs and real-time performance.', 10, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(30, 4, 'icon', NULL, NULL, 'Deploy', 'Cloud and VPS deployment with Docker and zero-downtime strategy.', 13, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(31, 4, 'icon', NULL, NULL, 'Cursor', 'AI-assisted development workflow for faster coding and debugging.', 14, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(32, 4, 'icon', NULL, NULL, 'PrimeVue', 'Vue UI component library for dashboards, forms, and rich admin interfaces.', 15, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(33, 4, 'icon', NULL, NULL, 'PrimeReact', 'React UI component library for production-ready dashboards and app layouts.', 16, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(34, 4, 'icon', NULL, NULL, 'Nuxt.js', 'Vue meta-framework for SSR, routing, and high-performance web apps.', 7, 'main', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(35, 4, 'icon', NULL, NULL, 'Next.js', 'React framework for SSR, routing, and scalable production frontends.', 18, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(36, 4, 'icon', NULL, NULL, 'Zustand', 'Lightweight React state management with a simple, scalable store API.', 19, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(37, 4, 'icon', NULL, NULL, 'Redux', 'Predictable React state container for complex application data flows.', 20, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(38, 4, 'icon', NULL, NULL, 'Vuex', 'Centralized state management for Vue applications and shared data.', 8, 'main', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(39, 4, 'icon', NULL, NULL, 'Pinia', 'Modern Vue store for typed, modular, and maintainable state.', 22, 'supporting', '2026-08-18 09:32:40', '2026-08-18 09:51:39'),
(40, 1, 'icon', NULL, NULL, 'TypeScript', 'Typed JavaScript for safer, scalable frontend and full-stack applications.', 9, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(41, 4, 'icon', NULL, NULL, 'Laravel', 'Secure Laravel backends, admin panels, and business web apps built for scalability and maintainability.', 0, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(42, 4, 'icon', NULL, NULL, 'Vue.js', 'Fast Vue.js frontends with reusable components, smooth interactions, and clean interface architecture.', 1, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(43, 4, 'icon', NULL, NULL, 'PHP', 'Custom PHP development for websites, APIs, and server-side logic with stable, production-ready code.', 2, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(44, 4, 'icon', NULL, NULL, 'Node.js', 'Node.js APIs and real-time services for modern full-stack web products and integrations.', 4, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(45, 4, 'icon', NULL, NULL, 'MySQL', 'Optimized MySQL database design for secure storage, efficient queries, and scalable web applications.', 5, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(46, 4, 'icon', NULL, NULL, 'React.js', 'React.js dashboards and web interfaces with modular components, responsive layouts, and smooth user flows.', 6, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39'),
(47, 4, 'icon', NULL, NULL, 'TypeScript', 'Typed JavaScript for safer, scalable frontend and full-stack applications.', 9, 'main', '2026-08-18 09:51:39', '2026-08-18 09:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `feature_sections`
--

CREATE TABLE `feature_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_sections`
--

INSERT INTO `feature_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Technology', 'Technology we Used', '2024-02-13 17:44:35', '2025-11-02 16:19:54'),
(2, 4, 'ফিচারস', 'আমাদের ফিচারস', '2024-11-02 12:26:04', '2024-11-02 12:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_contents`
--

CREATE TABLE `fixed_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `desc` text NOT NULL,
  `btn_name` varchar(191) DEFAULT NULL,
  `btn_link` varchar(191) DEFAULT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1,
  `thumbnail_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_contents`
--

INSERT INTO `fixed_contents` (`id`, `language_id`, `title`, `desc`, `btn_name`, `btn_link`, `image_status`, `thumbnail_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'We Build Modern Web Products.', 'Custom websites, ecommerce platforms, CRM, HRM, POS, and business software — engineered with Laravel, Vue.js, PHP, Node.js, and React.', 'View Works', '#', 1, 'demo-hero.png', '2024-02-07 06:37:37', '2026-08-18 07:59:54'),
(2, 4, 'আপনার ব্যবসা ডিজিটাল করুন', 'আমরা আমাদের পরিষেবা অফার করার আগে ব্যবহারকারীর অভিজ্ঞতাকে মূল্য দিই। এই মুহূর্তটি আমাদের সাথে সহযোগিতা করার এবং আপনার ব্র্যান্ডকে নতুন উচ্চতায় উন্নীত করার জন্য উপস্থাপন করে। আসুন এই সুযোগটি কাজে লাগাই এবং একসাথে আপনার ব্যবসাকে এগিয়ে নিয়ে যাই।', 'সর্বশেষ কাজ', '#', 1, 'demo-hero.png', '2024-11-02 10:34:17', '2026-07-30 04:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_keywords`
--

CREATE TABLE `frontend_keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `key` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_keywords`
--

INSERT INTO `frontend_keywords` (`id`, `language_id`, `key`, `value`) VALUES
(1, 1, 'home', 'Home'),
(2, 1, 'about_us', 'About Us'),
(3, 1, 'services', 'Services'),
(4, 1, 'portfolio', 'Portfolio'),
(5, 1, 'blogs', 'Blogs'),
(6, 1, 'contact', 'Contact'),
(7, 1, 'pages', 'Pages'),
(8, 1, 'download', 'Download'),
(9, 1, 'read_more', 'Read More'),
(10, 1, 'back_to_home', 'Back To Home'),
(11, 1, 'scroll_down', 'Scroll Down'),
(12, 1, 'service_details', 'Service Details'),
(13, 1, 'recent_posts', 'Recent Posts'),
(14, 1, 'share', 'Share'),
(17, 1, 'all', 'All'),
(18, 1, 'do_you_need_a_new_project', 'Do you need a new project?'),
(19, 1, 'get_in_touch', 'Get In Touch'),
(20, 1, 'anonymous', 'Anonymous'),
(21, 1, 'name', 'Name'),
(22, 1, 'email', 'Email'),
(23, 1, 'subject', 'Subject'),
(24, 1, 'send_message', 'Send Message'),
(25, 1, 'customer_relationship', 'Customer Relationship'),
(26, 1, 'address', 'Address'),
(27, 1, 'address_map_link', 'Address Map Link'),
(28, 1, 'email_and_phone', 'Email And Phone'),
(29, 1, 'portfolio_details', 'Portfolio Details'),
(30, 1, 'search', 'Search'),
(31, 1, 'search_here', 'Search Here...'),
(32, 1, 'categories', 'Categories'),
(33, 1, 'tags', 'Tags'),
(34, 1, 'leave_a_comment', 'Leave A Comment'),
(35, 1, 'your_name', 'Your Name'),
(36, 1, 'your_email', 'Your Email'),
(37, 1, 'your_comment', 'Your Comment'),
(38, 1, 'send_comment', 'Send Comment'),
(39, 1, 'search_results', 'Search Results'),
(40, 1, 'nothing_found', 'Nothing Found'),
(41, 1, 'your_message_has_been_delivered', 'Your message has been delivered.'),
(42, 1, 'your_comment_is_pending_approval', 'Your comment is pending approval.'),
(85, 1, 'home', 'Home'),
(86, 1, 'about_us', 'About Us'),
(87, 1, 'services', 'Services'),
(88, 1, 'portfolio', 'Portfolio'),
(89, 1, 'blogs', 'Blogs'),
(90, 1, 'contact', 'Contact'),
(91, 1, 'pages', 'Pages'),
(92, 1, 'download', 'Download'),
(93, 1, 'read_more', 'Read More'),
(94, 1, 'back_to_home', 'Back To Home'),
(95, 1, 'scroll_down', 'Scroll Down'),
(96, 1, 'service_details', 'Service Details'),
(97, 1, 'recent_posts', 'Recent Posts'),
(98, 1, 'share', 'Share'),
(101, 1, 'all', 'All'),
(102, 1, 'do_you_need_a_new_project', 'Do you need a new project?'),
(103, 1, 'get_in_touch', 'Get In Touch'),
(104, 1, 'anonymous', 'Anonymous'),
(105, 1, 'name', 'Name'),
(106, 1, 'email', 'Email'),
(107, 1, 'subject', 'Subject'),
(108, 1, 'send_message', 'Send Message'),
(109, 1, 'customer_relationship', 'Customer Relationship'),
(110, 1, 'address', 'Address'),
(111, 1, 'address_map_link', 'Address Map Link'),
(112, 1, 'email_and_phone', 'Email And Phone'),
(113, 1, 'portfolio_details', 'Portfolio Details'),
(114, 1, 'search', 'Search'),
(115, 1, 'search_here', 'Search Here...'),
(116, 1, 'categories', 'Categories'),
(117, 1, 'tags', 'Tags'),
(118, 1, 'leave_a_comment', 'Leave A Comment'),
(119, 1, 'your_name', 'Your Name'),
(120, 1, 'your_email', 'Your Email'),
(121, 1, 'your_comment', 'Your Comment'),
(122, 1, 'send_comment', 'Send Comment'),
(123, 1, 'search_results', 'Search Results'),
(124, 1, 'nothing_found', 'Nothing Found'),
(125, 1, 'your_message_has_been_delivered', 'Your message has been delivered.'),
(126, 1, 'your_comment_is_pending_approval', 'Your comment is pending approval.'),
(127, 4, 'home', 'হোম'),
(128, 4, 'about_us', 'আমাদের সম্পর্কে'),
(129, 4, 'services', 'সার্ভিসেস'),
(130, 4, 'portfolio', 'পোর্টফলিও'),
(131, 4, 'blogs', 'ব্লগ'),
(132, 4, 'contact', 'যোগাযোগ'),
(133, 4, 'pages', 'পেজগুলো'),
(134, 4, 'download', 'ডাউনলোড'),
(135, 4, 'read_more', 'আরো পড়ুন'),
(136, 4, 'back_to_home', 'ব্যাক টু হোম'),
(137, 4, 'scroll_down', 'স্ক্রল ডাউন'),
(138, 4, 'service_details', 'বিস্তারিত সেবা'),
(139, 4, 'recent_posts', 'সর্বশেষ পোস্ট'),
(140, 4, 'share', 'শেয়ার'),
(143, 4, 'all', 'সব'),
(144, 4, 'do_you_need_a_new_project', 'নতুন প্রজেক্ট শুরু করবেন?'),
(145, 4, 'get_in_touch', 'গেট ইন টাচ'),
(146, 4, 'anonymous', 'এনোনিমাস'),
(147, 4, 'name', 'নাম'),
(148, 4, 'email', 'ইমেইল'),
(149, 4, 'subject', 'বিষয়'),
(150, 4, 'send_message', 'সেন্ড মেসেজ'),
(151, 4, 'customer_relationship', 'কাস্টমার রিলেশনশিপ'),
(152, 4, 'address', 'ঠিকানা'),
(153, 4, 'address_map_link', 'এড্রেস ম্যাপ লিঙ্ক'),
(154, 4, 'email_and_phone', 'ইমেইল এন্ড ফোন'),
(155, 4, 'portfolio_details', 'বিস্তারিত পোর্টফোলিও'),
(156, 4, 'search', 'সার্চ'),
(157, 4, 'search_here', 'সার্চ করুন'),
(158, 4, 'categories', 'ক্যাটেগরিস'),
(159, 4, 'tags', 'ট্যাগস'),
(160, 4, 'leave_a_comment', 'কমেন্ট করুন'),
(161, 4, 'your_name', 'আপনার নাম'),
(162, 4, 'your_email', 'আপনার ইমেইল'),
(163, 4, 'your_comment', 'আপনার মন্তব্য'),
(164, 4, 'send_comment', 'সেন্ড কমেন্ট'),
(165, 4, 'search_results', 'সার্চ রেজাল্ট'),
(166, 4, 'nothing_found', 'কোনো কিছু পাওয়া যায়নি'),
(167, 4, 'your_message_has_been_delivered', 'আপনার মেসেজ পাঠানো হয়েছে'),
(168, 4, 'your_comment_is_pending_approval', 'আপনার কমেন্ট পেন্ডিংয়ে আছে'),
(169, 1, 'technology', 'Technology'),
(170, 4, 'technology', 'প্রযুক্তি');

-- --------------------------------------------------------

--
-- Table structure for table `google_analytics`
--

CREATE TABLE `google_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_analytic` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_analytics`
--

INSERT INTO `google_analytics` (`id`, `google_analytic`, `created_at`, `updated_at`) VALUES
(1, 'G-GXCR13YZXX', '2024-02-15 00:55:29', '2024-03-15 08:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_versions`
--

CREATE TABLE `homepage_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choose_version` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_versions`
--

INSERT INTO `homepage_versions` (`id`, `choose_version`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-02 13:14:54', '2026-08-18 04:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `info_lists`
--

CREATE TABLE `info_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `desc` varchar(191) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_lists`
--

INSERT INTO `info_lists` (`id`, `language_id`, `title`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Name :', 'Netigian IT', 0, '2024-02-07 06:51:46', '2024-02-15 17:56:45'),
(2, 1, 'Country :', 'Bangladesh', 1, '2024-02-07 06:52:09', '2024-02-26 01:25:01'),
(3, 1, 'Custom Order :', 'Available Now', 2, '2024-02-07 06:53:59', '2024-03-21 12:07:01'),
(4, 1, 'Languages :', 'English, Arabic, French, Bengali', 4, '2024-02-07 06:54:31', '2026-08-17 13:31:55'),
(5, 1, 'Services :', 'Ecommerce, Portfolio, Agency, CRM, HRM, POS', 5, '2024-02-07 06:55:14', '2026-08-18 07:59:54'),
(6, 1, 'Address :', 'H-83, R-13, Sonadanga R/A, Khulna, Bangladesh', 6, '2024-02-07 06:55:43', '2024-02-26 01:23:41'),
(7, 4, 'এজেন্সি নামঃ', 'নেটিজিয়ান আইটি', 0, '2024-11-02 10:37:55', '2024-11-02 10:42:17'),
(8, 4, 'দেশঃ', 'বাংলাদেশ', 1, '2024-11-02 10:38:15', '2026-08-17 13:31:55'),
(9, 4, 'কাস্টম অর্ডারঃ', 'আমরা প্রস্তত আছি', 2, '2024-11-02 10:38:38', '2026-08-17 13:31:55'),
(10, 4, 'ভাষাঃ', 'ইংরেজি, বাংলা, আরবী, ফ্রেন্স', 4, '2024-11-02 10:39:03', '2026-08-17 13:31:55'),
(11, 4, 'সার্ভিসেসঃ', 'ওয়েব ডেভেলপমেন্ট, ইকমার্স, CRM, HRM, POS, কাস্টম ওয়েবসাইট', 5, '2024-11-02 10:40:16', '2026-08-18 07:59:54'),
(12, 4, 'ঠিকানাঃ', 'এইচ-৮৩, আর-১৩, সোনাডাঙ্গা আর/এ, খুলনা, বাংলাদেশ', 6, '2024-11-02 10:41:21', '2026-08-17 13:31:55'),
(13, 1, 'Email :', 'contact@netigianit.com', 3, '2026-08-17 13:31:55', '2026-08-17 13:31:55'),
(14, 4, 'ইমেইলঃ', 'contact@netigianit.com', 3, '2026-08-17 13:31:55', '2026-08-17 13:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(191) NOT NULL,
  `language_code` varchar(191) NOT NULL,
  `direction` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `display_dropdown` int(11) NOT NULL,
  `default_site_language` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `language_code`, `direction`, `status`, `display_dropdown`, `default_site_language`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 0, 1, 1, 1, '2021-05-02 13:14:51', '2025-11-22 21:51:20'),
(4, 'Bengali', 'bn-BD', 0, 0, 1, 0, '2024-11-02 10:13:59', '2025-11-22 21:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_24_005133_create_sessions_table', 1),
(7, '2020_09_26_225805_create_languages_table', 1),
(8, '2020_09_30_133427_create_sliders_table', 1),
(9, '2020_09_30_231340_create_abouts_table', 1),
(10, '2020_10_06_090858_create_services_table', 1),
(11, '2020_10_07_095629_create_service_sections_table', 1),
(12, '2020_10_08_123654_create_features_table', 1),
(13, '2020_10_08_204636_create_counters_table', 1),
(14, '2020_10_10_092350_create_teams_table', 1),
(15, '2020_10_10_092409_create_team_sections_table', 1),
(16, '2020_10_16_144438_create_site_infos_table', 1),
(17, '2020_10_21_053827_create_google_analytics_table', 1),
(18, '2020_10_21_055547_create_seos_table', 1),
(19, '2020_10_21_073549_create_categories_table', 1),
(20, '2020_10_22_003541_create_blogs_table', 1),
(21, '2020_10_22_004159_create_blog_sections_table', 1),
(22, '2020_10_24_064553_create_contacts_table', 1),
(23, '2020_10_24_064616_create_contact_sections_table', 1),
(24, '2020_10_25_004806_create_site_images_table', 1),
(25, '2020_11_05_081548_create_socials_table', 1),
(26, '2020_11_05_125854_create_breadcrumbs_table', 1),
(27, '2020_11_05_132410_create_sections_table', 1),
(28, '2020_11_06_073530_create_pages_table', 1),
(29, '2020_11_11_112402_create_messages_table', 1),
(30, '2020_11_18_125114_create_testimonials_table', 1),
(31, '2020_11_19_105332_create_comments_table', 1),
(32, '2021_02_05_064120_create_color_options_table', 1),
(33, '2021_02_10_001331_create_photos_table', 1),
(34, '2021_02_11_133721_create_feature_sections_table', 1),
(35, '2021_02_14_230418_create_service_paginates_table', 1),
(36, '2021_02_15_230212_create_blog_paginates_table', 1),
(37, '2021_02_15_231253_create_blog_background_images_table', 1),
(38, '2021_02_20_155758_create_portfolio_categories_table', 1),
(39, '2021_02_20_155820_create_portfolios_table', 1),
(40, '2021_02_20_160050_create_portfolio_sections_table', 1),
(41, '2021_02_21_005201_create_permission_tables', 1),
(42, '2021_03_12_145009_create_fixed_contents_table', 1),
(43, '2021_03_12_152225_create_videos_table', 1),
(44, '2021_03_12_161559_create_info_lists_table', 1),
(45, '2021_03_31_090731_create_service_details_table', 1),
(46, '2021_03_31_095702_create_counter_sections_table', 1),
(47, '2021_03_31_101632_create_work_processes_table', 1),
(48, '2021_03_31_101645_create_work_process_sections_table', 1),
(49, '2021_04_17_094919_create_skills_table', 1),
(50, '2021_04_17_095121_create_skill_info_lists_table', 1),
(51, '2021_04_18_125219_create_portfolio_details_table', 1),
(52, '2021_04_19_070023_create_portfolio_sliders_table', 1),
(53, '2021_04_19_114028_create_testimonial_sections_table', 1),
(54, '2021_04_19_152848_create_panel_keywords_table', 1),
(55, '2021_04_19_153008_create_frontend_keywords_table', 1),
(56, '2021_04_21_090937_create_homepage_versions_table', 1),
(57, '2021_04_24_133615_create_external_urls_table', 1),
(58, '2021_04_24_161613_create_subscribes_table', 1),
(59, '2021_04_25_114234_create_quick_access_buttons_table', 1),
(60, '2020_10_22_003541_create_projects_table', 2),
(64, '2026_08_18_211900_add_stack_to_features_table', 3),
(65, '2026_08_22_124200_remove_optimizer_permission_and_keyword', 4),
(66, '2026_08_22_124500_remove_external_url_feature', 5),
(67, '2026_08_22_125200_remove_subscribe_permission_and_keywords', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `page_title` text NOT NULL,
  `desc` text NOT NULL,
  `display_header_menu` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `page_slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `language_id`, `page_title`, `desc`, `display_header_menu`, `status`, `order`, `page_slug`, `created_at`, `updated_at`) VALUES
(3, 1, 'Recent Works Update', '<p>services</p>', 0, 1, 1, 'services', '2024-02-13 10:32:03', '2024-02-27 00:23:12'),
(4, 1, 'Checkout Case Study', '<p>Recent Works</p>', 0, 1, 2, 'works', '2024-02-13 10:32:32', '2024-02-27 00:22:53'),
(6, 1, 'Terms and Condition', '<h5><b>Terms and Conditions</b></h5><h5><b><br></b></h5><p>Welcome to Netigian IT, a digital agency focused on providing innovative digital solutions. These terms and conditions govern your use of our website; by accessing this website, you accept these terms and conditions in full. If you disagree with any part of these terms and conditions, please do not use our website.<br></p><p><b><br></b></p><p><b>Intellectual Property Rights:</b></p><p>Unless otherwise stated, we or our licensors own the intellectual property rights in the website and material on the website. Subject to the license below, all these intellectual property rights are reserved.</p><p>You may view, download for caching purposes only, and print pages from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.</p><p><br></p><p><b>Acceptable Use:</b></p><p>You must not use our website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose or activity.</p><p>You must not use our website to copy, store, host, transmit, send, use, publish, or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit, or other malicious computer software.</p><p>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction, and data harvesting) on or in relation to our website without our express written consent.</p><p><br></p><p><b>Limitations of Liability:</b></p><p>We will not be liable to you (whether under the law of contact, the law of torts, or otherwise) in relation to the contents of, or use of, or otherwise in connection with, this website:</p><p>- for any indirect, special or consequential loss; or</p><p>- for any business losses, loss of revenue, income, profits or anticipated savings, loss of contracts or business relationships, loss of reputation or goodwill, or loss or corruption of information or data.</p><p>These limitations of liability apply even if we have been expressly advised of the potential loss.</p><p><br></p><p><b>Variation:</b></p><p>We may revise these terms and conditions from time-to-time. Revised terms and conditions will apply to the use of our website from the date of the publication of the revised terms and conditions on our website. Please check this page regularly to ensure you are familiar with the current version.</p><p><br></p><p><b>Entire Agreement:</b></p><p>These terms and conditions constitute the entire agreement between you and us in relation to your use of our website and supersede all previous agreements in respect of your use of this website.</p><p><br></p><p>Contact Information:</p><p>If you have any questions about our terms and conditions, please contact us via email at contact@netigianit.com.</p><p>Feel free to adjust this template according to your specific needs and legal advice.</p>', 0, 1, 4, 'terms', '2024-02-13 10:34:32', '2024-04-01 08:25:45'),
(7, 1, 'Privacy Policy', '<h5>Our Privacy Policy</h5><p><br></p><p><b>Privacy Policy: (</b>Last updated: 17-02-24)</p><p>Welcome to Netigian, a digital agency committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you visit our website or use our services.<br></p><p><br></p><p><b>Information We Collect:  </b><b>(</b>Personal Information)</p><p>We may collect personally identifiable information that you provide to us, such as your name, email address, phone number, and company details. This information is collected when you fill out forms on our website or communicate with us through email or other channels.</p><p><br></p><p><span style=\"font-weight:bolder;\">Information We Collect:  </span>(Non-Personal Information)</p><p>We may also collect non-personal information, such as browser type, operating system, IP address, and website usage statistics, through the use of cookies and other tracking technologies. This information helps us improve our website and services.</p><p><br></p><p><b>How We Use Your Information</b>:  (We use the collected information for various purposes, including)</p><p>- Providing and maintaining our services<br></p><p>- Improving our website and services</p><p>- Responding to your inquiries and requests</p><p>- Sending promotional materials and updates with your consent</p><p>- Complying with legal obligations</p><p><br></p><p><b>Disclosure of Your Information</b>:  (We may share your personal information with third parties in certain situations, such as)</p><p>- Service providers who assist us in delivering our services<br></p><p>- Legal authorities to comply with applicable laws and regulations</p><p>- Business partners for joint marketing efforts with your consent</p><p><br></p><p><b>Security</b>:  (We do not sell or rent your personal information to third parties for marketing purposes)</p><p>We take reasonable measures to protect your personal information from unauthorized access, disclosure, alteration, and destruction. However, please be aware that no method of transmission over the internet or electronic storage is completely secure.<br></p><p><br></p><p><b>Your Choices:  (</b>You can control the information you provide to us and how it is used. You have the right to)</p><p>- Access, update, or delete your personal information</p><p>- Opt-out of receiving promotional communications</p><p><br></p><p><b>Changes to This Privacy Policy:</b><br></p><p>We may update our Privacy Policy from time to time. Any changes will be posted on this page with a revised effective date.</p><p><br></p><p><b>Contact Us:</b></p><p>If you have any questions or concerns about our Privacy Policy, please contact us at <b>contact@netigianit.com</b></p>', 0, 1, 5, 'privacy-policy', '2024-02-13 10:35:05', '2024-04-01 08:26:33'),
(9, 1, 'Presentation', '<p><br></p>', 0, 1, 0, 'presentation', '2024-02-17 18:25:50', '2024-03-10 19:56:20'),
(10, 1, 'FAQ', '<p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">1. What services does\r\nyour digital agency provide?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Web Development, Digital\r\nMarketing, Video Editing, Graphic Design &amp; Search Engine Optimization.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">2. How do you approach\r\nwebsite design and development projects?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We begin by defining\r\nproject goals, researching industry trends, and creating a comprehensive plan.\r\nOur iterative process includes wireframing, design, development, thorough\r\ntesting, and ongoing maintenance for optimal client satisfaction and project\r\nsuccess.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">3. What sets your agency\r\napart from others in the industry?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Our agency\r\ndifferentiates with a focus on cutting-edge design, robust communication, and a\r\npersonalized client-centric approach, ensuring unique solutions and enduring\r\nclient satisfaction.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">4. Can you provide\r\nexamples of your previous work or case studies?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">While I don\'t have\r\nspecific examples, our portfolio boasts diverse projects showcasing innovative\r\ndesign and successful outcomes. Client testimonials and case studies are\r\navailable upon request.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">5. How do you handle\r\nwebsite maintenance and updates post-launch?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We handle website\r\nmaintenance and updates post-launch by offering regular monitoring, timely\r\nsoftware patches, and proactive content updates, ensuring optimal performance\r\nand security while adapting to evolving needs and trends.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">6. What is your approach\r\nto search engine optimization (SEO)?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We prioritize SEO\r\nthrough meticulous keyword research, on-page optimization, and adherence to\r\nsearch engine guidelines, aiming for enhanced online visibility and organic\r\ntraffic growth. Continuous monitoring and adaptation ensure sustained\r\nperformance.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">7. How do you ensure a\r\nwebsite is mobile-friendly and responsive?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We prioritize mobile\r\nresponsiveness by employing responsive design techniques and thorough testing\r\nacross various devices, ensuring optimal user experiences and adaptability.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">8. What is your process\r\nfor creating a digital marketing strategy?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">   -\r\nProvide insights into your approach to digital marketing, including market\r\nresearch, target audience analysis, and the selection of appropriate channels\r\nand tactics.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">9. How do you handle\r\nwebsite security and data protection?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We start by conducting\r\nthorough market research and analyzing client goals, then craft tailored\r\nstrategies leveraging diverse channels and data-driven insights, ensuring\r\neffective implementation and continual optimization for maximum impact.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">10. What is your\r\ntimeline for completing a typical web development project?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Our typical web\r\ndevelopment projects follow a structured timeline, usually ranging from a few\r\nweeks for smaller projects to several months for more complex endeavors,\r\nensuring thorough planning, execution, and testing.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">11. How do you determine\r\nthe cost of a project?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We assess project scope,\r\ncomplexity, and required resources, factoring in design, development, and\r\ntesting phases, ensuring a transparent and tailored cost estimation aligned\r\nwith client needs and goals.</span></p><p><span style=\"font-size:12pt;font-family:\'Times New Roman\', serif;\"> </span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">12. What is your\r\napproach to client communication and collaboration during a project?</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">We prioritize\r\ntransparent and regular communication, keeping clients informed of project\r\nprogress and involving them in key decisions. Our collaborative approach\r\nensures client input is valued, resulting in a successful and tailored project\r\noutcome.</span></p><p> </p>', 1, 1, 6, 'frequently-asked-questions', '2024-02-27 00:21:33', '2026-08-15 05:57:39'),
(11, 4, 'সর্বশেষ প্রজেক্ট', '<p>সর্বশেষ প্রজেক্ট</p>', 0, 1, 0, 'recent-works', '2024-11-02 15:22:41', '2024-11-02 15:23:00'),
(12, 4, 'প্রেজেন্টেশন', '<p>প্রেজেন্টেশন</p>', 0, 1, 0, 'presentations', '2024-11-02 15:23:46', '2024-11-02 15:24:07'),
(13, 4, 'প্রশ্নোত্তর', '<p>প্রশ্নোত্তর</p>', 1, 1, 0, 'faq', '2024-11-02 15:24:20', '2024-11-02 15:24:46'),
(14, 4, 'কেস স্টাডি', '<p>কেস স্টাডি</p>', 0, 1, 0, 'case-studys', '2024-11-02 15:28:54', '2024-11-02 15:29:11'),
(16, 4, 'গোপনীয়তা নীতি', '<p>গোপনিয়তা নীতি</p>', 0, 1, 0, 'terms-and-conditions', '2024-11-02 15:31:58', '2024-11-02 15:32:09'),
(17, 4, 'প্রাইভেসি পলিসি', '<p>প্রাইভেসি পলিসি</p>', 0, 1, 0, 'privacy-policys', '2024-11-02 15:33:48', '2024-11-02 15:34:19'),
(18, 4, 'আমাদের সম্পর্কে', '<p>আমাদের সম্পর্কে</p>', 0, 1, 0, 'about-us', '2024-11-02 15:35:41', '2024-11-02 15:36:13'),
(19, 4, 'আমাদের ভিশন', '<p>আমাদের ভিশন</p>', 0, 1, 0, 'our-vision', '2024-11-02 15:37:24', '2024-11-02 15:37:40'),
(20, 1, 'Our Vision', '<p>Our Vision</p>', 0, 1, 0, 'our-vision-2', '2024-11-02 15:38:44', '2024-11-02 15:38:44'),
(21, 1, 'About Us', '<p>About Us</p>', 0, 1, 0, 'about-us-2', '2024-11-02 15:39:01', '2024-11-02 15:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `panel_keywords`
--

CREATE TABLE `panel_keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `key` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panel_keywords`
--

INSERT INTO `panel_keywords` (`id`, `language_id`, `key`, `value`) VALUES
(1, 1, 'dashboard', 'Dashboard'),
(2, 1, 'admin_role_manage', 'Admin Role Manage'),
(3, 1, 'add_admin_role', 'Add Admin Role'),
(4, 1, 'role_name', 'Role Name'),
(5, 1, 'permissions', 'Permissions'),
(6, 1, 'set_permissions_for_this_role', 'set permissions for this role'),
(7, 1, 'submit', 'Submit'),
(8, 1, 'admin_roles', 'Admin Roles'),
(9, 1, 'has_all_permissions', 'has all permissions'),
(10, 1, 'action', 'Action'),
(11, 1, 'edit_admin_role', 'Edit Admin Role'),
(12, 1, 'admin_manage', 'Admin Manage'),
(13, 1, 'all_admin', 'All Admin'),
(14, 1, 'all_admin_created_by_super_admin', 'All Admin Created By Super Admin'),
(15, 1, 'add_admin_user', 'Add Admin User'),
(16, 1, 'edit_admin_user', 'Edit Admin User'),
(17, 1, 'name', 'Name'),
(18, 1, 'email', 'Email'),
(19, 1, 'new_password', 'New Password'),
(20, 1, 'confirm_password', 'Confirm Password'),
(21, 1, 'image', 'Image'),
(22, 1, 'size', 'size'),
(23, 1, 'delete', 'Delete'),
(24, 1, 'close', 'Close'),
(25, 1, 'you_wont_be_able_to_revert_this', 'You wont be able to revert this!'),
(26, 1, 'cancel', 'Cancel'),
(27, 1, 'yes_delete_it', 'Yes, delete it!'),
(28, 1, 'created_successfully', 'Created Successfully'),
(29, 1, 'updated_successfully', 'Updated Successfully'),
(30, 1, 'deleted_successfully', 'Deleted Successfully'),
(31, 1, 'current_image', 'Current Image'),
(32, 1, 'uploads', 'Uploads'),
(33, 1, 'add_photo', 'Add Photo'),
(34, 1, 'photos', 'Photos'),
(35, 1, 'order', 'Order'),
(36, 1, 'copy_image_link', 'Copy Image Link'),
(37, 1, 'edit_photo', 'Edit Photo'),
(38, 1, 'banner', 'Hero Section'),
(39, 1, 'add_new', 'Add New'),
(40, 1, 'fixed_content', 'Fixed Content'),
(41, 1, 'section_title', 'Section Title'),
(42, 1, 'title', 'Title'),
(43, 1, 'description', 'Description'),
(44, 1, 'button_name', 'Button Name'),
(45, 1, 'button_link', 'Button Link'),
(46, 1, 'please_use_recommended_sizes', 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.'),
(47, 1, 'image_status', 'Image Status'),
(48, 1, 'thumbnail', 'Thumbnail'),
(49, 1, 'sliders', 'Sliders'),
(50, 1, 'add_slider', 'Add Slider'),
(51, 1, 'edit_slider', 'Edit Slider'),
(52, 1, 'video', 'Video'),
(53, 1, 'about', 'About'),
(54, 1, 'video_link', 'Video Link'),
(55, 1, 'youtube_supported', 'Youtube Supported'),
(56, 1, 'cv_or_any_file', 'CV Or Any File'),
(57, 1, 'information_list', 'Information List'),
(58, 1, 'add_info', 'Add Info'),
(59, 1, 'edit_info', 'Edit Info'),
(60, 1, 'back', 'Back'),
(61, 1, 'features', 'Features'),
(62, 1, 'add_feature', 'Add Feature'),
(63, 1, 'edit_feature', 'Edit Feature'),
(64, 1, 'type', 'Type'),
(65, 1, 'btn_link', 'Button Link'),
(66, 1, 'btn_name', 'Button Name'),
(67, 1, 'blogs', 'Blogs'),
(68, 1, 'categories', 'Categories'),
(69, 1, 'add_category', 'Add Category'),
(70, 1, 'edit_category', 'Edit Category'),
(71, 1, 'category_name', 'Category Name'),
(72, 1, 'please_choose', 'Please choose.'),
(73, 1, 'please_create_a_category', 'Please create a category.'),
(74, 1, 'status', 'Status'),
(75, 1, 'select_your_option', 'Select Your Option'),
(76, 1, 'enable', 'Enable'),
(77, 1, 'disable', 'Disable'),
(78, 1, 'section_title_and_desc', 'Section Title/Description'),
(79, 1, 'not_yet_created', 'Not yet created.'),
(80, 1, 'category', 'Category'),
(81, 1, 'post_date', 'Post Date'),
(82, 1, 'view', 'View'),
(83, 1, 'add_blog', 'Add Blog'),
(84, 1, 'edit_blog', 'Edit Blog'),
(85, 1, 'short_desc', 'Short Description'),
(86, 1, 'tag', 'Tag'),
(87, 1, 'separate_with_commas', 'Separate with commas'),
(88, 1, 'author', 'Author'),
(89, 1, 'with_this_account', 'With this account'),
(90, 1, 'anonymous', 'Anonymous'),
(91, 1, 'seo_optimization', 'Seo Optimization'),
(92, 1, 'meta_desc', 'Meta Description'),
(93, 1, 'meta_keyword', 'Meta Keyword'),
(94, 1, 'breadcrumb_customization', 'Breadcrumb Customization'),
(95, 1, 'use_special_breadcrumb', 'Do you want to use special breadcrumb for the page?'),
(96, 1, 'yes', 'Yes'),
(97, 1, 'no', 'No'),
(98, 1, 'custom_breadcrumb_image', 'Custom Breadcrumb Image'),
(99, 1, 'published', 'Published'),
(100, 1, 'draft', 'Draft'),
(101, 1, 'blog_paginate', 'Blog Paginate'),
(102, 1, 'homepage_item', 'Homepage Item'),
(103, 1, 'grid_view_paginate', 'Grid View Paginate'),
(104, 1, 'services', 'Services'),
(105, 1, 'add_service', 'Add Service'),
(106, 1, 'edit_service', 'Edit Service'),
(107, 1, 'icon', 'Icon'),
(108, 1, 'all', 'All'),
(109, 1, 'additional_features', 'Additional Features'),
(110, 1, 'select', 'Select'),
(111, 1, 'service_paginate', 'Service Paginate'),
(112, 1, 'paginate', 'Paginate'),
(113, 1, 'counters', 'Counters'),
(114, 1, 'add_counter', 'Add Counter'),
(115, 1, 'edit_counter', 'Edit Counter'),
(116, 1, 'timer', 'Timer'),
(117, 1, 'work_processes', 'Work Processes'),
(118, 1, 'add_work_process', 'Add Work Process'),
(119, 1, 'edit_work_process', 'Edit Work Process'),
(120, 1, 'skill', 'Skill'),
(121, 1, 'percent_rate', 'Percent Rate'),
(122, 1, 'portfolios', 'Portfolios'),
(123, 1, 'add_portfolio', 'Add Portfolio'),
(124, 1, 'edit_portfolio', 'Edit Portfolio'),
(125, 1, 'details', 'Details'),
(126, 1, 'add_detail', 'Add Detail'),
(127, 1, 'edit_detail', 'Edit Detail'),
(128, 1, 'teams', 'Teams'),
(129, 1, 'add_team', 'Add Team'),
(130, 1, 'edit_team', 'Edit Team'),
(131, 1, 'job', 'Job'),
(132, 1, 'testimonials', 'Testimonials'),
(133, 1, 'add_testimonial', 'Add Testimonial'),
(134, 1, 'edit_testimonial', 'Edit Testimonial'),
(135, 1, 'star', 'Star'),
(136, 1, 'pages', 'Pages'),
(137, 1, 'add_page', 'Add Page'),
(138, 1, 'edit_page', 'Edit Page'),
(139, 1, 'display_header_menu', 'Display Header Menu?'),
(140, 1, 'other', 'Other'),
(141, 1, 'copy_link', 'Copy Link'),
(142, 1, 'copied_text', 'Copied Text'),
(143, 1, 'contact', 'Contact'),
(144, 1, 'contact_info', 'Contact Info'),
(145, 1, 'map_iframe', 'Map Iframe (link in src)'),
(146, 1, 'map_iframe_desc_placeholder', 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.'),
(147, 1, 'add_contact', 'Add Contact'),
(148, 1, 'edit_contact', 'Edit Contact'),
(149, 1, 'socials', 'Socials'),
(150, 1, 'add_social', 'Add Social'),
(151, 1, 'edit_social', 'Edit Social'),
(152, 1, 'link', 'Link'),
(153, 1, 'messages', 'Messages'),
(154, 1, 'mark_all_as_read', 'Mark All As Read'),
(155, 1, 'subject', 'Subject'),
(156, 1, 'message', 'Message'),
(157, 1, 'read_status', 'Read Status'),
(158, 1, 'read', 'Read'),
(159, 1, 'unread', 'Unread'),
(160, 1, 'mark', 'Mark'),
(161, 1, 'settings', 'Settings'),
(162, 1, 'site_info', 'Site Info'),
(163, 1, 'site_images', 'Site Images'),
(164, 1, 'copyright', 'Copyright'),
(165, 1, 'address', 'Address'),
(166, 1, 'address_map_link', 'Address Map Link'),
(167, 1, 'phone', 'Phone'),
(168, 1, 'favicon', 'Favicon'),
(169, 1, 'admin_logo', 'Admin Logo'),
(170, 1, 'admin_small_logo', 'Admin Small Logo'),
(171, 1, 'site_white_logo', 'Site White Logo'),
(172, 1, 'site_colored_logo', 'Site Colored Logo'),
(173, 1, 'google_analytic', 'Google Analytic'),
(174, 1, 'breadcrumb', 'Breadcrumb'),
(175, 1, 'sections', 'Sections'),
(176, 1, 'color_option', 'Color Option'),
(177, 1, 'seo', 'Seo'),
(178, 1, 'site_name', 'Site Name'),
(179, 1, 'site_desc', 'Site Description'),
(180, 1, 'site_keywords', 'Site Keywords'),
(181, 1, 'languages', 'Languages'),
(182, 1, 'default_site_language', 'Default Site Language'),
(183, 1, 'add_language', 'Add Language'),
(184, 1, 'language_name', 'Language Name'),
(185, 1, 'language_code', 'Language Code'),
(186, 1, 'direction', 'Direction'),
(187, 1, 'display_dropdown', 'Display Dropdown?'),
(188, 1, 'show', 'Show'),
(189, 1, 'hide', 'Hide'),
(190, 1, 'keywords', 'Keywords'),
(191, 1, 'for_admin_panel', 'For Admin Panel'),
(192, 1, 'for_frontend', 'For Frontend'),
(193, 1, 'profile', 'Profile'),
(194, 1, 'change_password', 'Change Password'),
(195, 1, 'current_password', 'Current Password'),
(196, 1, 'pending_approval', 'Pending Approval'),
(197, 1, 'approval', 'Approval'),
(198, 1, 'data_language', 'Data Language'),
(199, 1, 'which_language', 'Which language do you want to create the data?'),
(200, 1, 'reminding', 'Please note that all the entries you create will be based on your chosen language.'),
(201, 1, 'notifications', 'Notifications'),
(202, 1, 'logout', 'Logout'),
(204, 1, 'required_fields', 'Fields marked are required'),
(205, 1, 'site', 'Site'),
(206, 1, 'add_keyword', 'Add Keyword'),
(207, 1, 'key', 'Key'),
(208, 1, 'value', 'Value'),
(209, 1, 'delete_selected', 'Delete selected?'),
(210, 1, 'comments', 'Comments'),
(211, 1, 'homepage_versions', 'Homepage Versions'),
(212, 1, 'choose_version', 'Choose Version'),
(213, 1, 'if_you_choose_no', 'If you choose No, it will appear in the footer section.'),
(214, 1, 'if_you_choose_other', 'If you choose the other, you\'ll know how to create links that you can use on your site.'),
(218, 1, 'quick_access_buttons', 'Quick Access Buttons'),
(219, 1, 'email_or_phone', 'Email Or Phone'),
(439, 1, 'dashboard', 'Dashboard'),
(440, 1, 'admin_role_manage', 'Admin Role Manage'),
(441, 1, 'add_admin_role', 'Add Admin Role'),
(442, 1, 'role_name', 'Role Name'),
(443, 1, 'permissions', 'Permissions'),
(444, 1, 'set_permissions_for_this_role', 'set permissions for this role'),
(445, 1, 'submit', 'Submit'),
(446, 1, 'admin_roles', 'Admin Roles'),
(447, 1, 'has_all_permissions', 'has all permissions'),
(448, 1, 'action', 'Action'),
(449, 1, 'edit_admin_role', 'Edit Admin Role'),
(450, 1, 'admin_manage', 'Admin Manage'),
(451, 1, 'all_admin', 'All Admin'),
(452, 1, 'all_admin_created_by_super_admin', 'All Admin Created By Super Admin'),
(453, 1, 'add_admin_user', 'Add Admin User'),
(454, 1, 'edit_admin_user', 'Edit Admin User'),
(455, 1, 'name', 'Name'),
(456, 1, 'email', 'Email'),
(457, 1, 'new_password', 'New Password'),
(458, 1, 'confirm_password', 'Confirm Password'),
(459, 1, 'image', 'Image'),
(460, 1, 'size', 'size'),
(461, 1, 'delete', 'Delete'),
(462, 1, 'close', 'Close'),
(463, 1, 'you_wont_be_able_to_revert_this', 'You wont be able to revert this!'),
(464, 1, 'cancel', 'Cancel'),
(465, 1, 'yes_delete_it', 'Yes, delete it!'),
(466, 1, 'created_successfully', 'Created Successfully'),
(467, 1, 'updated_successfully', 'Updated Successfully'),
(468, 1, 'deleted_successfully', 'Deleted Successfully'),
(469, 1, 'current_image', 'Current Image'),
(470, 1, 'uploads', 'Uploads'),
(471, 1, 'add_photo', 'Add Photo'),
(472, 1, 'photos', 'Photos'),
(473, 1, 'order', 'Order'),
(474, 1, 'copy_image_link', 'Copy Image Link'),
(475, 1, 'edit_photo', 'Edit Photo'),
(477, 1, 'add_new', 'Add New'),
(478, 1, 'fixed_content', 'Fixed Content'),
(479, 1, 'section_title', 'Section Title'),
(480, 1, 'title', 'Title'),
(481, 1, 'description', 'Description'),
(482, 1, 'button_name', 'Button Name'),
(483, 1, 'button_link', 'Button Link'),
(484, 1, 'please_use_recommended_sizes', 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.'),
(485, 1, 'image_status', 'Image Status'),
(486, 1, 'thumbnail', 'Thumbnail'),
(487, 1, 'sliders', 'Sliders'),
(488, 1, 'add_slider', 'Add Slider'),
(489, 1, 'edit_slider', 'Edit Slider'),
(490, 1, 'video', 'Video'),
(491, 1, 'about', 'About'),
(492, 1, 'video_link', 'Video Link'),
(493, 1, 'youtube_supported', 'Youtube Supported'),
(494, 1, 'cv_or_any_file', 'CV Or Any File'),
(495, 1, 'information_list', 'Information List'),
(496, 1, 'add_info', 'Add Info'),
(497, 1, 'edit_info', 'Edit Info'),
(498, 1, 'back', 'Back'),
(499, 1, 'features', 'Features'),
(500, 1, 'add_feature', 'Add Feature'),
(501, 1, 'edit_feature', 'Edit Feature'),
(502, 1, 'type', 'Type'),
(503, 1, 'btn_link', 'Button Link'),
(504, 1, 'btn_name', 'Button Name'),
(505, 1, 'blogs', 'Blogs'),
(506, 1, 'categories', 'Categories'),
(507, 1, 'add_category', 'Add Category'),
(508, 1, 'edit_category', 'Edit Category'),
(509, 1, 'category_name', 'Category Name'),
(510, 1, 'please_choose', 'Please choose.'),
(511, 1, 'please_create_a_category', 'Please create a category.'),
(512, 1, 'status', 'Status'),
(513, 1, 'select_your_option', 'Select Your Option'),
(514, 1, 'enable', 'Enable'),
(515, 1, 'disable', 'Disable'),
(516, 1, 'section_title_and_desc', 'Section Title/Description'),
(517, 1, 'not_yet_created', 'Not yet created.'),
(518, 1, 'category', 'Category'),
(519, 1, 'post_date', 'Post Date'),
(520, 1, 'view', 'View'),
(521, 1, 'add_blog', 'Add Blog'),
(522, 1, 'edit_blog', 'Edit Blog'),
(523, 1, 'short_desc', 'Short Description'),
(524, 1, 'tag', 'Tag'),
(525, 1, 'separate_with_commas', 'Separate with commas'),
(526, 1, 'author', 'Author'),
(527, 1, 'with_this_account', 'With this account'),
(528, 1, 'anonymous', 'Anonymous'),
(529, 1, 'seo_optimization', 'Seo Optimization'),
(530, 1, 'meta_desc', 'Meta Description'),
(531, 1, 'meta_keyword', 'Meta Keyword'),
(532, 1, 'breadcrumb_customization', 'Breadcrumb Customization'),
(533, 1, 'use_special_breadcrumb', 'Do you want to use special breadcrumb for the page?'),
(534, 1, 'yes', 'Yes'),
(535, 1, 'no', 'No'),
(536, 1, 'custom_breadcrumb_image', 'Custom Breadcrumb Image'),
(537, 1, 'published', 'Published'),
(538, 1, 'draft', 'Draft'),
(539, 1, 'blog_paginate', 'Blog Paginate'),
(540, 1, 'homepage_item', 'Homepage Item'),
(541, 1, 'grid_view_paginate', 'Grid View Paginate'),
(542, 1, 'services', 'Services'),
(543, 1, 'add_service', 'Add Service'),
(544, 1, 'edit_service', 'Edit Service'),
(545, 1, 'icon', 'Icon'),
(546, 1, 'all', 'All'),
(547, 1, 'additional_features', 'Additional Features'),
(548, 1, 'select', 'Select'),
(549, 1, 'service_paginate', 'Service Paginate'),
(550, 1, 'paginate', 'Paginate'),
(551, 1, 'counters', 'Counters'),
(552, 1, 'add_counter', 'Add Counter'),
(553, 1, 'edit_counter', 'Edit Counter'),
(554, 1, 'timer', 'Timer'),
(555, 1, 'work_processes', 'Work Processes'),
(556, 1, 'add_work_process', 'Add Work Process'),
(557, 1, 'edit_work_process', 'Edit Work Process'),
(558, 1, 'skill', 'Skill'),
(559, 1, 'percent_rate', 'Percent Rate'),
(560, 1, 'portfolios', 'Portfolios'),
(561, 1, 'add_portfolio', 'Add Portfolio'),
(562, 1, 'edit_portfolio', 'Edit Portfolio'),
(563, 1, 'details', 'Details'),
(564, 1, 'add_detail', 'Add Detail'),
(565, 1, 'edit_detail', 'Edit Detail'),
(566, 1, 'teams', 'Teams'),
(567, 1, 'add_team', 'Add Team'),
(568, 1, 'edit_team', 'Edit Team'),
(569, 1, 'job', 'Job'),
(570, 1, 'testimonials', 'Testimonials'),
(571, 1, 'add_testimonial', 'Add Testimonial'),
(572, 1, 'edit_testimonial', 'Edit Testimonial'),
(573, 1, 'star', 'Star'),
(574, 1, 'pages', 'Pages'),
(575, 1, 'add_page', 'Add Page'),
(576, 1, 'edit_page', 'Edit Page'),
(577, 1, 'display_header_menu', 'Display Header Menu?'),
(578, 1, 'other', 'Other'),
(579, 1, 'copy_link', 'Copy Link'),
(580, 1, 'copied_text', 'Copied Text'),
(581, 1, 'contact', 'Contact'),
(582, 1, 'contact_info', 'Contact Info'),
(583, 1, 'map_iframe', 'Map Iframe (link in src)'),
(584, 1, 'map_iframe_desc_placeholder', 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.'),
(585, 1, 'add_contact', 'Add Contact'),
(586, 1, 'edit_contact', 'Edit Contact'),
(587, 1, 'socials', 'Socials'),
(588, 1, 'add_social', 'Add Social'),
(589, 1, 'edit_social', 'Edit Social'),
(590, 1, 'link', 'Link'),
(591, 1, 'messages', 'Messages'),
(592, 1, 'mark_all_as_read', 'Mark All As Read'),
(593, 1, 'subject', 'Subject'),
(594, 1, 'message', 'Message'),
(595, 1, 'read_status', 'Read Status'),
(596, 1, 'read', 'Read'),
(597, 1, 'unread', 'Unread'),
(598, 1, 'mark', 'Mark'),
(599, 1, 'settings', 'Settings'),
(600, 1, 'site_info', 'Site Info'),
(601, 1, 'site_images', 'Site Images'),
(602, 1, 'copyright', 'Copyright'),
(603, 1, 'address', 'Address'),
(604, 1, 'address_map_link', 'Address Map Link'),
(605, 1, 'phone', 'Phone'),
(606, 1, 'favicon', 'Favicon'),
(607, 1, 'admin_logo', 'Admin Logo'),
(608, 1, 'admin_small_logo', 'Admin Small Logo'),
(609, 1, 'site_white_logo', 'Site White Logo'),
(610, 1, 'site_colored_logo', 'Site Colored Logo'),
(611, 1, 'google_analytic', 'Google Analytic'),
(612, 1, 'breadcrumb', 'Breadcrumb'),
(613, 1, 'sections', 'Sections'),
(614, 1, 'color_option', 'Color Option'),
(615, 1, 'seo', 'Seo'),
(616, 1, 'site_name', 'Site Name'),
(617, 1, 'site_desc', 'Site Description'),
(618, 1, 'site_keywords', 'Site Keywords'),
(619, 1, 'languages', 'Languages'),
(620, 1, 'default_site_language', 'Default Site Language'),
(621, 1, 'add_language', 'Add Language'),
(622, 1, 'language_name', 'Language Name'),
(623, 1, 'language_code', 'Language Code'),
(624, 1, 'direction', 'Direction'),
(625, 1, 'display_dropdown', 'Display Dropdown?'),
(626, 1, 'show', 'Show'),
(627, 1, 'hide', 'Hide'),
(628, 1, 'keywords', 'Keywords'),
(629, 1, 'for_admin_panel', 'For Admin Panel'),
(630, 1, 'for_frontend', 'For Frontend'),
(631, 1, 'profile', 'Profile'),
(632, 1, 'change_password', 'Change Password'),
(633, 1, 'current_password', 'Current Password'),
(634, 1, 'pending_approval', 'Pending Approval'),
(635, 1, 'approval', 'Approval'),
(636, 1, 'data_language', 'Data Language'),
(637, 1, 'which_language', 'Which language do you want to create the data?'),
(638, 1, 'reminding', 'Please note that all the entries you create will be based on your chosen language.'),
(639, 1, 'notifications', 'Notifications'),
(640, 1, 'logout', 'Logout'),
(642, 1, 'required_fields', 'Fields marked are required'),
(643, 1, 'site', 'Site'),
(644, 1, 'add_keyword', 'Add Keyword'),
(645, 1, 'key', 'Key'),
(646, 1, 'value', 'Value'),
(647, 1, 'delete_selected', 'Delete selected?'),
(648, 1, 'comments', 'Comments'),
(649, 1, 'homepage_versions', 'Homepage Versions'),
(650, 1, 'choose_version', 'Choose Version'),
(651, 1, 'if_you_choose_no', 'If you choose No, it will appear in the footer section.'),
(652, 1, 'if_you_choose_other', 'If you choose the other, you\'ll know how to create links that you can use on your site.'),
(656, 1, 'quick_access_buttons', 'Quick Access Buttons'),
(657, 1, 'email_or_phone', 'Email Or Phone'),
(658, 4, 'dashboard', 'ড্যাশবোর্ড'),
(659, 4, 'admin_role_manage', 'Admin Role Manage'),
(660, 4, 'add_admin_role', 'Add Admin Role'),
(661, 4, 'role_name', 'Role Name'),
(662, 4, 'permissions', 'Permissions'),
(663, 4, 'set_permissions_for_this_role', 'set permissions for this role'),
(664, 4, 'submit', 'জমা দিন'),
(665, 4, 'admin_roles', 'Admin Roles'),
(666, 4, 'has_all_permissions', 'has all permissions'),
(667, 4, 'action', 'অ্যাকশন'),
(668, 4, 'edit_admin_role', 'Edit Admin Role'),
(669, 4, 'admin_manage', 'Admin Manage'),
(670, 4, 'all_admin', 'All Admin'),
(671, 4, 'all_admin_created_by_super_admin', 'All Admin Created By Super Admin'),
(672, 4, 'add_admin_user', 'Add Admin User'),
(673, 4, 'edit_admin_user', 'Edit Admin User'),
(674, 4, 'name', 'Name'),
(675, 4, 'email', 'Email'),
(676, 4, 'new_password', 'New Password'),
(677, 4, 'confirm_password', 'Confirm Password'),
(678, 4, 'image', 'Image'),
(679, 4, 'size', 'size'),
(680, 4, 'delete', 'মুছুন'),
(681, 4, 'close', 'বন্ধ'),
(682, 4, 'you_wont_be_able_to_revert_this', 'You wont be able to revert this!'),
(683, 4, 'cancel', 'বাতিল'),
(684, 4, 'yes_delete_it', 'Yes, delete it!'),
(685, 4, 'created_successfully', 'সফলভাবে তৈরি হয়েছে।'),
(686, 4, 'updated_successfully', 'সফলভাবে আপডেট হয়েছে।'),
(687, 4, 'deleted_successfully', 'Deleted Successfully'),
(688, 4, 'current_image', 'Current Image'),
(689, 4, 'uploads', 'Uploads'),
(690, 4, 'add_photo', 'Add Photo'),
(691, 4, 'photos', 'Photos'),
(692, 4, 'order', 'Order'),
(693, 4, 'copy_image_link', 'Copy Image Link'),
(694, 4, 'edit_photo', 'Edit Photo'),
(695, 4, 'banner', 'হিরো সেকশন'),
(696, 4, 'add_new', 'Add New'),
(697, 4, 'fixed_content', 'ফিক্সড কনটেন্ট'),
(698, 4, 'section_title', 'Section Title'),
(699, 4, 'title', 'শিরোনাম'),
(700, 4, 'description', 'বিবরণ'),
(701, 4, 'button_name', 'Button Name'),
(702, 4, 'button_link', 'Button Link'),
(703, 4, 'please_use_recommended_sizes', 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.'),
(704, 4, 'image_status', 'Image Status'),
(705, 4, 'thumbnail', 'Thumbnail'),
(706, 4, 'sliders', 'স্লাইডার'),
(707, 4, 'add_slider', 'স্লাইডার যোগ করুন'),
(708, 4, 'edit_slider', 'স্লাইডার সম্পাদনা'),
(709, 4, 'video', 'ভিডিও'),
(710, 4, 'about', 'আমাদের সম্পর্কে'),
(711, 4, 'video_link', 'Video Link'),
(712, 4, 'youtube_supported', 'Youtube Supported'),
(713, 4, 'cv_or_any_file', 'CV Or Any File'),
(714, 4, 'information_list', 'Information List'),
(715, 4, 'add_info', 'Add Info'),
(716, 4, 'edit_info', 'Edit Info'),
(717, 4, 'back', 'পেছনে'),
(718, 4, 'features', 'ফিচার'),
(719, 4, 'add_feature', 'Add Feature'),
(720, 4, 'edit_feature', 'Edit Feature'),
(721, 4, 'type', 'Type'),
(722, 4, 'btn_link', 'Button Link'),
(723, 4, 'btn_name', 'Button Name'),
(724, 4, 'blogs', 'ব্লগ'),
(725, 4, 'categories', 'Categories'),
(726, 4, 'add_category', 'Add Category'),
(727, 4, 'edit_category', 'Edit Category'),
(728, 4, 'category_name', 'Category Name'),
(729, 4, 'please_choose', 'Please choose.'),
(730, 4, 'please_create_a_category', 'Please create a category.'),
(731, 4, 'status', 'স্ট্যাটাস'),
(732, 4, 'select_your_option', 'Select Your Option'),
(733, 4, 'enable', 'সক্রিয়'),
(734, 4, 'disable', 'নিষ্ক্রিয়'),
(735, 4, 'section_title_and_desc', 'Section Title/Description'),
(736, 4, 'not_yet_created', 'Not yet created.'),
(737, 4, 'category', 'Category'),
(738, 4, 'post_date', 'Post Date'),
(739, 4, 'view', 'View'),
(740, 4, 'add_blog', 'Add Blog'),
(741, 4, 'edit_blog', 'Edit Blog'),
(742, 4, 'short_desc', 'Short Description'),
(743, 4, 'tag', 'Tag'),
(744, 4, 'separate_with_commas', 'Separate with commas'),
(745, 4, 'author', 'Author'),
(746, 4, 'with_this_account', 'With this account'),
(747, 4, 'anonymous', 'Anonymous'),
(748, 4, 'seo_optimization', 'Seo Optimization'),
(749, 4, 'meta_desc', 'Meta Description'),
(750, 4, 'meta_keyword', 'Meta Keyword'),
(751, 4, 'breadcrumb_customization', 'Breadcrumb Customization'),
(752, 4, 'use_special_breadcrumb', 'Do you want to use special breadcrumb for the page?'),
(753, 4, 'yes', 'Yes'),
(754, 4, 'no', 'No'),
(755, 4, 'custom_breadcrumb_image', 'Custom Breadcrumb Image'),
(756, 4, 'published', 'Published'),
(757, 4, 'draft', 'Draft'),
(758, 4, 'blog_paginate', 'Blog Paginate'),
(759, 4, 'homepage_item', 'Homepage Item'),
(760, 4, 'grid_view_paginate', 'Grid View Paginate'),
(761, 4, 'services', 'সেবাসমূহ'),
(762, 4, 'add_service', 'Add Service'),
(763, 4, 'edit_service', 'Edit Service'),
(764, 4, 'icon', 'Icon'),
(765, 4, 'all', 'All'),
(766, 4, 'additional_features', 'Additional Features'),
(767, 4, 'select', 'Select'),
(768, 4, 'service_paginate', 'Service Paginate'),
(769, 4, 'paginate', 'Paginate'),
(770, 4, 'counters', 'কাউন্টার'),
(771, 4, 'add_counter', 'Add Counter'),
(772, 4, 'edit_counter', 'Edit Counter'),
(773, 4, 'timer', 'Timer'),
(774, 4, 'work_processes', 'কাজের প্রক্রিয়া'),
(775, 4, 'add_work_process', 'Add Work Process'),
(776, 4, 'edit_work_process', 'Edit Work Process'),
(777, 4, 'skill', 'দক্ষতা'),
(778, 4, 'percent_rate', 'Percent Rate'),
(779, 4, 'portfolios', 'পোর্টফোলিও'),
(780, 4, 'add_portfolio', 'Add Portfolio'),
(781, 4, 'edit_portfolio', 'Edit Portfolio'),
(782, 4, 'details', 'Details'),
(783, 4, 'add_detail', 'Add Detail'),
(784, 4, 'edit_detail', 'Edit Detail'),
(785, 4, 'teams', 'টিম'),
(786, 4, 'add_team', 'Add Team'),
(787, 4, 'edit_team', 'Edit Team'),
(788, 4, 'job', 'Job'),
(789, 4, 'testimonials', 'প্রশংসাপত্র'),
(790, 4, 'add_testimonial', 'Add Testimonial'),
(791, 4, 'edit_testimonial', 'Edit Testimonial'),
(792, 4, 'star', 'Star'),
(793, 4, 'pages', 'পেজ'),
(794, 4, 'add_page', 'Add Page'),
(795, 4, 'edit_page', 'Edit Page'),
(796, 4, 'display_header_menu', 'Display Header Menu?'),
(797, 4, 'other', 'Other'),
(798, 4, 'copy_link', 'Copy Link'),
(799, 4, 'copied_text', 'Copied Text'),
(800, 4, 'contact', 'যোগাযোগ'),
(801, 4, 'contact_info', 'Contact Info'),
(802, 4, 'map_iframe', 'Map Iframe (link in src)'),
(803, 4, 'map_iframe_desc_placeholder', 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.'),
(804, 4, 'add_contact', 'Add Contact'),
(805, 4, 'edit_contact', 'Edit Contact'),
(806, 4, 'socials', 'Socials'),
(807, 4, 'add_social', 'Add Social'),
(808, 4, 'edit_social', 'Edit Social'),
(809, 4, 'link', 'Link'),
(810, 4, 'messages', 'বার্তা'),
(811, 4, 'mark_all_as_read', 'Mark All As Read'),
(812, 4, 'subject', 'Subject'),
(813, 4, 'message', 'Message'),
(814, 4, 'read_status', 'Read Status'),
(815, 4, 'read', 'Read'),
(816, 4, 'unread', 'Unread'),
(817, 4, 'mark', 'Mark'),
(818, 4, 'settings', 'সেটিংস'),
(819, 4, 'site_info', 'Site Info'),
(820, 4, 'site_images', 'Site Images'),
(821, 4, 'copyright', 'Copyright'),
(822, 4, 'address', 'Address'),
(823, 4, 'address_map_link', 'Address Map Link'),
(824, 4, 'phone', 'Phone'),
(825, 4, 'favicon', 'Favicon'),
(826, 4, 'admin_logo', 'Admin Logo'),
(827, 4, 'admin_small_logo', 'Admin Small Logo'),
(828, 4, 'site_white_logo', 'Site White Logo'),
(829, 4, 'site_colored_logo', 'Site Colored Logo'),
(830, 4, 'google_analytic', 'Google Analytic'),
(831, 4, 'breadcrumb', 'Breadcrumb'),
(832, 4, 'sections', 'Sections'),
(833, 4, 'color_option', 'Color Option'),
(834, 4, 'seo', 'Seo'),
(835, 4, 'site_name', 'Site Name'),
(836, 4, 'site_desc', 'Site Description'),
(837, 4, 'site_keywords', 'Site Keywords'),
(838, 4, 'languages', 'ভাষা'),
(839, 4, 'default_site_language', 'Default Site Language'),
(840, 4, 'add_language', 'Add Language'),
(841, 4, 'language_name', 'Language Name'),
(842, 4, 'language_code', 'Language Code'),
(843, 4, 'direction', 'Direction'),
(844, 4, 'display_dropdown', 'Display Dropdown?'),
(845, 4, 'show', 'Show'),
(846, 4, 'hide', 'Hide'),
(847, 4, 'keywords', 'Keywords'),
(848, 4, 'for_admin_panel', 'For Admin Panel'),
(849, 4, 'for_frontend', 'For Frontend'),
(850, 4, 'profile', 'Profile'),
(851, 4, 'change_password', 'Change Password'),
(852, 4, 'current_password', 'Current Password'),
(853, 4, 'pending_approval', 'Pending Approval'),
(854, 4, 'approval', 'Approval'),
(855, 4, 'data_language', 'Data Language'),
(856, 4, 'which_language', 'Which language do you want to create the data?'),
(857, 4, 'reminding', 'Please note that all the entries you create will be based on your chosen language.'),
(858, 4, 'notifications', 'Notifications'),
(859, 4, 'logout', 'Logout'),
(861, 4, 'required_fields', 'চিহ্নিত ফিল্ডগুলো আবশ্যক'),
(862, 4, 'site', 'সাইট'),
(863, 4, 'add_keyword', 'Add Keyword'),
(864, 4, 'key', 'Key'),
(865, 4, 'value', 'Value'),
(866, 4, 'delete_selected', 'Delete selected?'),
(867, 4, 'comments', 'Comments'),
(868, 4, 'homepage_versions', 'হোমপেজ ভার্সন'),
(869, 4, 'choose_version', 'Choose Version'),
(870, 4, 'if_you_choose_no', 'If you choose No, it will appear in the footer section.'),
(871, 4, 'if_you_choose_other', 'If you choose the other, you\'ll know how to create links that you can use on your site.'),
(875, 4, 'quick_access_buttons', 'Quick Access Buttons'),
(876, 4, 'email_or_phone', 'Email Or Phone'),
(877, 1, 'hero_section', 'Hero Section'),
(878, 4, 'hero_section', 'হিরো সেকশন');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'uploads check', 'web', '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(3, 'banner check', 'web', '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(5, 'about us check', 'web', '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(6, 'features check', 'web', '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(7, 'services check', 'web', '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(8, 'counters check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(9, 'work processes check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(10, 'skill check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(11, 'portfolio check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(12, 'teams check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(13, 'testimonials check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(14, 'blogs check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(15, 'settings check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(16, 'contact check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(17, 'pages check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(18, 'comments check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(19, 'language check', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_image` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `desc` text DEFAULT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1,
  `thumbnail_image` text DEFAULT NULL,
  `portfolio_slug` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `breadcrumb_status` int(11) NOT NULL DEFAULT 1,
  `custom_breadcrumb_image` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `language_id`, `category_name`, `category_id`, `title`, `desc`, `image_status`, `thumbnail_image`, `portfolio_slug`, `status`, `meta_desc`, `meta_keyword`, `breadcrumb_status`, `custom_breadcrumb_image`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ecommerce', 1, 'Nova Commerce', '<p>A modern ecommerce storefront with fast product discovery, clean checkout, and a green-forward brand experience built for conversion.</p>', 1, 'demo-nova-commerce.png', 'nova-commerce', 1, 'A modern ecommerce storefront with fast product discovery, clean checkout, and a green-forward brand experience built for conversion.', 'Nova Commerce, Netigian IT, portfolio', 0, NULL, 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(2, 4, 'ইকমার্স', 4, 'নোভা কমার্স', '<p>দ্রুত প্রোডাক্ট সার্চ, সহজ চেকআউট এবং কনভার্সন-ফ্রেন্ডলি ডিজাইনসহ আধুনিক ইকমার্স স্টোরফ্রন্ট।</p>', 1, 'demo-nova-commerce.png', 'nova-commerce-bn', 1, 'দ্রুত প্রোডাক্ট সার্চ, সহজ চেকআউট এবং কনভার্সন-ফ্রেন্ডলি ডিজাইনসহ আধুনিক ইকমার্স স্টোরফ্রন্ট।', 'নোভা কমার্স, Netigian IT', 0, NULL, 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(3, 1, 'Web App', 2, 'Pulse Finance', '<p>A fintech web experience with clear money insights, secure account views, and a calm dashboard interface for everyday banking.</p>', 1, 'demo-pulse-finance.png', 'pulse-finance', 1, 'A fintech web experience with clear money insights, secure account views, and a calm dashboard interface for everyday banking.', 'Pulse Finance, Netigian IT, portfolio', 0, NULL, 2, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(4, 4, 'ওয়েব অ্যাপ', 5, 'পালস ফাইন্যান্স', '<p>নিরাপদ অ্যাকাউন্ট ভিউ এবং পরিষ্কার ড্যাশবোর্ডসহ ফিনটেক ওয়েব এক্সপেরিয়েন্স।</p>', 1, 'demo-pulse-finance.png', 'pulse-finance-bn', 1, 'নিরাপদ অ্যাকাউন্ট ভিউ এবং পরিষ্কার ড্যাশবোর্ডসহ ফিনটেক ওয়েব এক্সপেরিয়েন্স।', 'পালস ফাইন্যান্স, Netigian IT', 0, NULL, 2, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(5, 1, 'Web App', 2, 'Atlas Trails', '<p>A travel booking website focused on destination storytelling, smart search, and an inviting journey from browse to book.</p>', 1, 'demo-atlas-trails.png', 'atlas-trails', 1, 'A travel booking website focused on destination storytelling, smart search, and an inviting journey from browse to book.', 'Atlas Trails, Netigian IT, portfolio', 0, NULL, 3, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(6, 4, 'ওয়েব অ্যাপ', 5, 'অ্যাটলাস ট্রেইলস', '<p>গন্তব্যের গল্প, স্মার্ট সার্চ এবং সহজ বুকিং ফ্লোসহ ট্রাভেল ওয়েবসাইট।</p>', 1, 'demo-atlas-trails.png', 'atlas-trails-bn', 1, 'গন্তব্যের গল্প, স্মার্ট সার্চ এবং সহজ বুকিং ফ্লোসহ ট্রাভেল ওয়েবসাইট।', 'অ্যাটলাস ট্রেইলস, Netigian IT', 0, NULL, 3, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(7, 1, 'UI / UX', 3, 'Verdant Care', '<p>A healthcare mobile UI system for appointments, reminders, and patient-friendly health tracking with soft green accents.</p>', 1, 'demo-verdant-care.png', 'verdant-care', 1, 'A healthcare mobile UI system for appointments, reminders, and patient-friendly health tracking with soft green accents.', 'Verdant Care, Netigian IT, portfolio', 0, NULL, 4, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(8, 4, 'ইউআই / ইউএক্স', 6, 'ভার্ডেন্ট কেয়ার', '<p>অ্যাপয়েন্টমেন্ট, রিমাইন্ডার এবং সহজ হেলথ ট্র্যাকিংয়ের জন্য মোবাইল ইউআই সিস্টেম।</p>', 1, 'demo-verdant-care.png', 'verdant-care-bn', 1, 'অ্যাপয়েন্টমেন্ট, রিমাইন্ডার এবং সহজ হেলথ ট্র্যাকিংয়ের জন্য মোবাইল ইউআই সিস্টেম।', 'ভার্ডেন্ট কেয়ার, Netigian IT', 0, NULL, 4, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(9, 1, 'UI / UX', 3, 'Studio Arc', '<p>An architecture studio portfolio with bold imagery, refined typography, and a gallery-first layout for showcase projects.</p>', 1, 'demo-studio-arc.png', 'studio-arc', 1, 'An architecture studio portfolio with bold imagery, refined typography, and a gallery-first layout for showcase projects.', 'Studio Arc, Netigian IT, portfolio', 0, NULL, 5, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(10, 4, 'ইউআই / ইউএক্স', 6, 'স্টুডিও আর্ক', '<p>বোল্ড ইমেজারি এবং গ্যালারি-ফার্স্ট লেআউটসহ আর্কিটেকচার স্টুডিও পোর্টফোলিও।</p>', 1, 'demo-studio-arc.png', 'studio-arc-bn', 1, 'বোল্ড ইমেজারি এবং গ্যালারি-ফার্স্ট লেআউটসহ আর্কিটেকচার স্টুডিও পোর্টফোলিও।', 'স্টুডিও আর্ক, Netigian IT', 0, NULL, 5, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(11, 1, 'Web App', 2, 'Beacon LMS', '<p>An online learning platform with course cards, progress tracking, and a focused study experience for modern learners.</p>', 1, 'demo-beacon-lms.png', 'beacon-lms', 1, 'An online learning platform with course cards, progress tracking, and a focused study experience for modern learners.', 'Beacon LMS, Netigian IT, portfolio', 0, NULL, 6, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(12, 4, 'ওয়েব অ্যাপ', 5, 'বিকন এলএমএস', '<p>কোর্স কার্ড, প্রগ্রেস ট্র্যাকিং এবং ফোকাসড স্টাডি এক্সপেরিয়েন্সসহ লার্নিং প্ল্যাটফর্ম।</p>', 1, 'demo-beacon-lms.png', 'beacon-lms-bn', 1, 'কোর্স কার্ড, প্রগ্রেস ট্র্যাকিং এবং ফোকাসড স্টাডি এক্সপেরিয়েন্সসহ লার্নিং প্ল্যাটফর্ম।', 'বিকন এলএমএস, Netigian IT', 0, NULL, 6, '2026-08-15 07:58:36', '2026-08-15 07:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `portfolio_category_slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `language_id`, `category_name`, `order`, `status`, `portfolio_category_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ecommerce', 1, 1, 'ecommerce', '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(2, 1, 'Web App', 2, 1, 'web-app', '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(3, 1, 'UI / UX', 3, 1, 'ui-ux', '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(4, 4, 'ইকমার্স', 1, 1, 'ecommerce-bn', '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(5, 4, 'ওয়েব অ্যাপ', 2, 1, 'web-app-bn', '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(6, 4, 'ইউআই / ইউএক্স', 3, 1, 'ui-ux-bn', '2026-08-15 07:58:36', '2026-08-15 07:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_details`
--

CREATE TABLE `portfolio_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `desc` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_sections`
--

CREATE TABLE `portfolio_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_sections`
--

INSERT INTO `portfolio_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Portfolio', 'Selected Projects', '2024-02-08 12:52:16', '2026-08-15 07:58:36'),
(2, 4, 'পোর্টফোলিও', 'নির্বাচিত প্রজেক্ট', '2024-11-02 17:18:23', '2026-08-15 07:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_sliders`
--

CREATE TABLE `portfolio_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_image` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_sliders`
--

INSERT INTO `portfolio_sliders` (`id`, `portfolio_id`, `portfolio_image`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'demo-nova-commerce.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(2, 2, 'demo-nova-commerce.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(3, 3, 'demo-pulse-finance.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(4, 4, 'demo-pulse-finance.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(5, 5, 'demo-atlas-trails.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(6, 6, 'demo-atlas-trails.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(7, 7, 'demo-verdant-care.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(8, 8, 'demo-verdant-care.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(9, 9, 'demo-studio-arc.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(10, 10, 'demo-studio-arc.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(11, 11, 'demo-beacon-lms.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36'),
(12, 12, 'demo-beacon-lms.png', 1, '2026-08-15 07:58:36', '2026-08-15 07:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_name` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `desc` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1,
  `project_image` text DEFAULT NULL,
  `type` enum('with_this_account','anonymous') NOT NULL,
  `slug` varchar(191) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `tag` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `breadcrumb_status` int(11) NOT NULL DEFAULT 0,
  `custom_breadcrumb_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quick_access_buttons`
--

CREATE TABLE `quick_access_buttons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_media` varchar(191) NOT NULL,
  `link` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `contact` varchar(191) NOT NULL,
  `email_or_phone` varchar(191) DEFAULT NULL,
  `status_phone` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_access_buttons`
--

INSERT INTO `quick_access_buttons` (`id`, `social_media`, `link`, `status`, `contact`, `email_or_phone`, `status_phone`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-whatsapp', 'https://wa.me/01770345518', 1, 'fas fa-envelope', 'contact@netigianit.com', 1, '2024-02-08 18:19:00', '2024-07-09 09:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(2, 'admin', 'web', '2021-05-02 13:14:52', '2021-05-02 13:14:52'),
(4, 'Manager', 'web', '2025-10-06 10:47:00', '2025-10-06 10:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(3, 4),
(6, 4),
(7, 2),
(11, 2),
(12, 2),
(14, 2),
(15, 2),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `section` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `section`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Page Menu', 'page_menu', 1, '2021-05-02 13:14:51', '2024-02-27 00:39:42'),
(2, 'About Us Section', 'about_us_section', 1, '2021-05-02 13:14:51', '2024-02-27 00:39:40'),
(3, 'Feature Section', 'feature_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(4, 'Service Section', 'service_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(5, 'Counter Section', 'counter_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(6, 'Work Process Section', 'work_process_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(7, 'Skill Section', 'skill_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(8, 'Portfolio Section', 'portfolio_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(9, 'Call To Action Section', 'call_to_action_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(10, 'Team Section', 'team_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(11, 'Client Section', 'client_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(12, 'Blog Section', 'blog_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(13, 'Contact Section', 'contact_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(14, 'Footer Section', 'footer_section', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(15, 'Scroll Top Button', 'scroll_top_btn', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(16, 'RTL Sidebar', 'rtl_sidebar', 0, '2021-05-02 13:14:51', '2024-03-13 05:51:49'),
(17, 'Color Option Sidebar', 'color_option_sidebar', 0, '2021-05-02 13:14:51', '2024-03-13 05:51:14'),
(18, 'Preloader', 'preloader', 1, '2021-05-02 13:14:51', '2021-05-02 13:14:51'),
(19, 'Page Menu', 'page_menu', 1, '2024-02-23 02:22:01', '2024-03-10 20:50:23'),
(20, 'About Us Section', 'about_us_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(21, 'Feature Section', 'feature_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(22, 'Service Section', 'service_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(23, 'Counter Section', 'counter_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(24, 'Work Process Section', 'work_process_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(25, 'Skill Section', 'skill_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(26, 'Portfolio Section', 'portfolio_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(27, 'Call To Action Section', 'call_to_action_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(28, 'Team Section', 'team_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(29, 'Client Section', 'client_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(30, 'Blog Section', 'blog_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(31, 'Project Section', 'project_section', 0, '2024-02-23 02:22:01', '2024-02-23 22:33:12'),
(32, 'Contact Section', 'contact_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(33, 'Footer Section', 'footer_section', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(34, 'Scroll Top Button', 'scroll_top_btn', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01'),
(35, 'RTL Sidebar', 'rtl_sidebar', 0, '2024-02-23 02:22:01', '2024-03-13 05:52:38'),
(36, 'Color Option Sidebar', 'color_option_sidebar', 0, '2024-02-23 02:22:01', '2024-03-13 05:52:33'),
(37, 'Preloader', 'preloader', 1, '2024-02-23 02:22:01', '2024-02-23 02:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keywords` text NOT NULL,
  `fb_app_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `language_id`, `site_name`, `site_desc`, `site_keywords`, `fb_app_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Netigian IT', 'We will help you to get solved your problem using website development, digital marketing, video editing. Get in touch as far as possible, our skilled team with mentor will give you best solution in shortly.', 'netigian it, web development, digital marketing, web agency in bangladesh, digital agency in bangladesh, video editing agency in bangladesh', '', '2024-02-08 18:17:08', '2024-03-18 05:39:08'),
(2, 4, 'নেটিজিয়ান আইটি', 'আমরা আমাদের পরিষেবা অফার করার আগে ব্যবহারকারীর অভিজ্ঞতাকে মূল্য দিই। এই মুহূর্তটি আমাদের সাথে সহযোগিতা করার এবং আপনার ব্র্যান্ডকে নতুন উচ্চতায় উন্নীত করার জন্য উপস্থাপন করে। আসুন এই সুযোগটি কাজে লাগাই এবং একসাথে আপনার ব্যবসাকে এগিয়ে নিয়ে যাই।', 'নেটিজিয়ান, নেটিজিয়ান আইটি, ওয়েব ডেভেলপমেন্ট বাংলাদেশ, ওয়েব এজেন্সি বাংলাদেশ, ওয়েব ডিজাইন বাংলাদেশ', '', '2024-11-02 14:20:01', '2024-11-02 14:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `desc` longtext DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `image_status` enum('enable','disable') NOT NULL,
  `service_image` text DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `service_slug` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `meta_desc` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `breadcrumb_status` int(11) NOT NULL DEFAULT 0,
  `custom_breadcrumb_image` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `language_id`, `title`, `desc`, `short_desc`, `image_status`, `service_image`, `icon`, `service_slug`, `status`, `meta_desc`, `meta_keyword`, `breadcrumb_status`, `custom_breadcrumb_image`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ecommerce', '<p><strong><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">Netigian Web Design Services\nOverview</span></strong></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At <b>Netigian IT</b>, we\nspecialize in front-end web design, dedicated to creating visually stunning,\nuser-friendly, and high-performance websites that leave a lasting impression.\nElevate your online presence with our focused web design services.</span></p><p><b><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Our web\ndesign services prioritize:</span></b></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Visually Stunning Designs:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We create visually appealing designs that reflect your\nbrand\'s identity and captivate your audience.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">User-Friendly Interfaces:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Emphasis on intuitive navigation and user experience to\nensure seamless interaction and engagement.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">High-Performance Websites:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Optimization for speed, performance, and responsiveness\nacross all devices, ensuring accessibility and satisfaction.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">To achieve exceptional\ndesign outcomes, we utilize:</span></b></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">HTML5, CSS3, JavaScript:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Core technologies for building modern, responsive websites\nwith dynamic front-end functionality.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Vue.js &amp; Nuxt.js:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> JavaScript frameworks for developing interactive and\nperformant user interfaces and applications.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Our web design services\ninclude essential features to enhance usability and visual appeal:</span></b></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Responsive Design:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Ensuring seamless functionality and aesthetics across\ndesktops, tablets, and mobile devices.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">User-Centered Design:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Understanding your audience to deliver designs that resonate\nand facilitate conversion.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Visual Design Excellence:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Incorporating aesthetic elements and design principles that\nenhance user engagement and brand perception.</span></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">We prioritize client\nsatisfaction and collaboration throughout the design process:</span></b></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Custom Solutions:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Tailoring designs to align with your business objectives,\nindustry standards, and brand identity.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Transparent Communication:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Maintaining clear and open communication to ensure your\nvision is realized effectively.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Timely Delivery:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Delivering projects on schedule while upholding high\nstandards of quality and craftsmanship.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Partner with <b>Netigian IT</b> to\ntransform your online presence with our dedicated front-end web design\nservices. Whether you\'re establishing a new website or refreshing an existing\none, we are committed to creating impactful designs that elevate your brand and\nprovide an exceptional user experience in the digital realm.</span></p>', 'Scalable online stores with product management, secure checkout, and conversion-focused shopping experiences.', 'enable', 'demo-service-01.png', 'fas fa-shopping-cart', 'ecommerce', 1, '', '', 1, NULL, 1, '2024-02-08 16:12:41', '2026-08-18 07:54:57'),
(2, 1, 'Portfolio', '<p><strong><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">Netigian IT Digital Marketing\nServices Overview</span></strong></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">In the digital age, establishing a strong online presence is\ncrucial for business growth. At <b>Netigian\nIT</b>, we specialize in comprehensive digital marketing services designed to\nelevate your brand and effectively connect with your target audience.</span></p><h3><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Digital Marketing Services</span></h3><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Search Engine Optimization\n(SEO):</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Enhance your\nwebsite’s visibility on search engines through strategic optimization\ntechniques, improving organic search rankings and driving targeted traffic.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Facebook Ad Campaign:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Create and manage targeted advertising campaigns on Facebook\nto reach specific demographics, increase brand awareness, and drive conversions.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social Media Marketing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Develop and execute social media strategies across platforms\nlike Facebook, Instagram, Twitter, and LinkedIn to engage your audience, build\nrelationships, and foster brand loyalty.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Content Marketing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Produce valuable and relevant content, such as articles,\nblogs, videos, and infographics, to attract and retain a clearly defined\naudience and drive profitable customer action.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Email Marketing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Utilize email campaigns to nurture leads, promote products\nor services, and maintain ongoing communication with your audience, enhancing\ncustomer retention and generating sales.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">YouTube Video Marketing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Promote your brand through compelling video content on\nYouTube, utilizing targeted advertising, video SEO, and audience engagement\nstrategies.</span></p><h3><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Digital Marketing Technology</span></h3><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">To deliver effective digital marketing campaigns, we leverage\nadvanced tools and platforms:</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">SEMrush:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Comprehensive SEO and competitive analysis tool to optimize\nwebsite performance and track keyword rankings.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Google Search Console:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Monitor website traffic, performance, and fix issues that\nmay affect search engine visibility.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">MailChimp:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Email marketing platform for designing, sending, and analyzing\nemail campaigns.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Google Keyword Planner:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Research and identify relevant keywords for SEO and PPC\ncampaigns.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">UberSuggest:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Keyword research tool providing insights into search volume,\ncompetition, and related keywords.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Hootsuite:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Social media management tool for scheduling posts,\nmonitoring engagement, and analyzing social media performance.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Google Analytics:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Track and analyze website traffic, user behavior, and\nconversion rates to optimize marketing strategies.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Facebook Ads Management:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Create, manage, and optimize Facebook advertising campaigns\nto reach targeted audiences and achieve marketing objectives.</span></p><h3><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Digital Marketing Common Features</span></h3><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Our digital marketing services encompass a range of essential\nfeatures to maximize effectiveness and efficiency:</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Social Media Management:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Engage with your audience, monitor mentions, and manage\nsocial media profiles to build brand authority and community.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Content Management:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Plan, create, and distribute valuable content across various\nplatforms to attract, inform, and engage your target audience.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Digital Advertising:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Implement paid advertising strategies across search engines,\nsocial media, and other digital platforms to drive traffic and conversions.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Customer Relationship\nManagement (CRM):</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Maintain and nurture\nrelationships with customers through personalized communication and targeted\nmarketing efforts.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Analytics &amp; Reporting:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Utilize data analytics to measure campaign performance,\ntrack KPIs, and optimize marketing strategies for better ROI.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Marketing Automation:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Streamline repetitive tasks and workflows, such as email\ncampaigns and social media scheduling, to improve efficiency and scalability.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">By integrating these services, technologies, and features,\nNetigian IT ensures your digital marketing efforts are strategic, impactful,\nand aligned with your business objectives, ultimately driving growth and\nenhancing your online presence.</span></p>', 'Modern portfolio websites designed to showcase your projects, skills, and personal brand beautifully.', 'enable', 'demo-service-02.png', 'fas fa-briefcase', 'portfolio', 1, '', '', 1, NULL, 2, '2024-02-08 17:05:46', '2026-08-18 07:54:57'),
(3, 1, 'Agency', '<p><strong><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">Netigian Video Editing Services\nOverview</span></strong></p><p><b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At Netigian</span></b><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">, we are passionate about transforming raw footage into visual\nstories that leave a lasting impact. Our video editing services are designed to\nhighlight your content, whether it\'s for personal projects, corporate\npresentations, marketing campaigns, or social media engagement.</span></p><h3><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Video Editing Services</span></h3><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">YouTube Videos:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We specialize in editing engaging YouTube videos that\ncaptivate audiences. Our services include adding intro/outro sequences,\nenhancing visuals and audio, and ensuring your content is optimized for viewer\nretention.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Facebook Videos:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our team creates compelling Facebook videos that are\ntailored for social media engagement. We focus on short, impactful clips that\nquickly grab attention and encourage interaction.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Short Videos:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We edit short videos for various platforms, perfect for\nquick promotions, social media posts, or event highlights. These videos are\ndesigned to deliver your message concisely and effectively.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Promotional Videos:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our promotional video editing services help you market your\nproducts or services. We combine striking visuals, compelling storytelling, and\nprofessional editing to create videos that drive engagement and conversions.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Animated Videos:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We bring your ideas to life with animated videos. Our\nservices include motion graphics, animated infographics, and character\nanimations, providing an engaging way to convey complex information or tell a\nstory.</span></p><h3><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Video Editing Technology</span></h3><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">To ensure high-quality video editing, we use advanced tools and\nresources:</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Adobe Premiere Pro:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> A professional video editing software used for comprehensive\nediting tasks, including multi-track editing, effects, and color correction.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Filmora:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> A user-friendly video editing tool that offers a wide range\nof effects, transitions, and audio enhancements, suitable for both beginners\nand professionals.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Shutterstock:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Provides a vast library of stock footage, music, and images\nto enhance video content.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Adobe Stock:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Offers high-quality stock videos, audio, and graphics that\ncan be seamlessly integrated into projects.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Freepik:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Supplies a variety of vector graphics and images to add\nvisual elements to videos.</span></p><h3><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Video Editing Common Features</span></h3><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Trimming and Cutting:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Precision cutting and trimming of footage to remove unwanted\nsections and create a seamless narrative.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Transitions and Timeline\nManagement:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Adding smooth\ntransitions between clips and managing the timeline to ensure the video flows\nwell.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Effects and Filters:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Applying various effects and filters to enhance the visual\nappeal of the video, including color correction and grading.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Text and Titles:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Adding dynamic text and titles to provide context, emphasize\nkey points, or add branding elements.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Audio Editing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Enhancing audio quality, syncing audio with video, and\nadding background music or sound effects.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Multi-Track Editing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Editing multiple video and audio tracks simultaneously for\ncomplex projects requiring layered content.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Key Framing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Creating animation and motion effects by setting keyframes\nfor different parameters like position, scale, and opacity.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Chroma Key (Green Screen):</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Removing green screen backgrounds and replacing them with\ndesired images or footage.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Speed Control:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Adjusting the speed of video clips to create slow-motion or\nfast-forward effects.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Storyboarding:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Planning and organizing video projects through storyboards\nto visualize scenes and sequences before editing.</span></p><p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Collaboration Tools:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Using tools that allow multiple team members to collaborate\non a project, provide feedback, and make revisions efficiently.</span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">By utilizing these services, technologies, and features, Netigian\nensures your video editing projects are polished, professional, and perfectly\nsuited to your needs.</span></p>', 'Professional agency websites that present your services, team, and case studies with a strong digital presence.', 'enable', 'demo-service-03.png', 'fas fa-building', 'agency', 1, '', '', 0, NULL, 3, '2024-02-08 17:08:23', '2026-08-18 07:54:57'),
(4, 1, 'CRM', '<p><b><span style=\"font-size:16pt;font-family:Arial, \'sans-serif\';color:#000000;\">Netigian IT Graphic\nDesign Services Overview</span></b></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Netigian IT</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> offers cutting-edge graphic design\nservices tailored to meet your unique needs. Our team of talented designers\ncombines creativity with technical expertise to deliver captivating visual\nsolutions that elevate your brand presence. Whether you need striking logos,\nengaging marketing materials, or eye-catching website designs, we provide\nprofessional and innovative designs that leave a lasting impression. With a\nfocus on quality, timeliness, and client satisfaction, <b>Netigian IT</b> is\nyour trusted partner for all your graphic design needs.</span></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"><br></span></p><p><b><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Graphic Design Services:</span></b></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">UI/UX Design:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Our UI/UX design services focus on\ncreating intuitive and user-friendly interfaces for websites and mobile\napplications. We enhance user experience through aesthetically pleasing layouts\nand seamless navigation, ensuring that your digital products are both\nfunctional and engaging.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Logo Design:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> We specialize in creating unique and\nmemorable logos that effectively represent your brand identity. Our logos are\ndesigned to be versatile and scalable, ensuring they look great across various\nplatforms and mediums.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">YouTube Thumbnail\nDesign:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Our YouTube\nthumbnail design service aims to attract viewers with compelling visuals and\nclear text, making your video content stand out and encouraging more clicks and\nviews.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Social Post Design:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> We develop engaging and visually appealing\ngraphics tailored to your brand’s voice and aesthetic for various social media\nplatforms, enhancing your social media presence and engagement.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">T-Shirt Design:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> We create eye-catching and trendy designs\nfor t-shirts that reflect your brand or personal style. Our designs are\ntailored to be printed on apparel, ensuring high-quality and impactful visual\nappeal.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Product Design:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Our product design services focus on\ncreating visually appealing and functional designs for various products,\nensuring they are attractive, user-friendly, and market-ready.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">E-commerce Product\nRetouching:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> We enhance the\nvisual appeal of your product images, making them look professional and\nattractive for online shoppers. This service includes color correction,\nbackground removal, and other retouching techniques to ensure your products\nstand out.</span></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><b><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Graphic Design Technology</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">To deliver high-quality\ndesigns, we utilize a range of advanced tools and technologies:</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Figma:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Ideal for collaborative UI/UX design,\nenabling us to create interactive and responsive designs.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Adobe Photoshop:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Used for detailed image editing, photo\nretouching, and creating complex graphics.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Adobe Illustrator:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Perfect for creating vector graphics,\nlogos, and illustrations with precision and scalability.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Canva Pro:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> A versatile tool for designing social\nmedia graphics, presentations, and other marketing materials.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Envato Elements:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Provides a vast library of templates,\ngraphics, and assets that enhance our design projects.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Freepik:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Offers a wide range of high-quality images,\nvectors, and illustrations to incorporate into our designs.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Pinterest Analytics:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Helps us understand design trends and\ngather inspiration to create visually appealing content.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Behance:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> A platform for showcasing our work and\ngaining inspiration from other designers\' portfolios.</span></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><b><span style=\"font-size:12.5pt;font-family:Arial, \'sans-serif\';color:#000000;\">Graphic Design Common Features</span></b></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Our graphic design\nservices include a variety of features to ensure high-quality results:</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Layering and Text\nEditing:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Creating complex\ndesigns with multiple layers and precise text adjustments.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Image Editing:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Enhancing and manipulating images to\nachieve the desired visual effect.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Vector Graphics:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Creating scalable graphics that maintain\nquality at any size.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Color Management:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Ensuring consistent and accurate color\nreproduction across different media.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Alignment and\nDistribution:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Precisely aligning\nand distributing design elements for balanced layouts.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Exporting &amp; File\nFormats:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Exporting designs\nin various formats suitable for web, print, and other uses.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Masking &amp; Clipping:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Using advanced techniques to isolate and\nmanipulate parts of images.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Drawing &amp; Painting:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Creating original illustrations and\nartwork using digital tools.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Collaboration Tools:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Utilizing tools that facilitate team\ncollaboration and client feedback.</span></p><p><b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">Effects and Filters:</span></b><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> Applying various effects and filters to\nenhance the visual appeal of designs.</span></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\"> </span></p><p><span style=\"font-size:12pt;font-family:Arial, \'sans-serif\';color:#000000;\">By combining these\nservices, technologies, and features, Netigian IT ensures that your graphic\ndesign projects are not only visually stunning but also aligned with your\nbrand’s goals and needs.</span></p>', 'Custom CRM systems to manage leads, customers, sales pipelines, and business relationships in one place.', 'enable', 'demo-service-04.png', 'fas fa-users', 'crm', 1, '', '', 0, NULL, 4, '2024-03-22 10:38:19', '2026-08-18 07:54:57');
INSERT INTO `services` (`id`, `language_id`, `title`, `desc`, `short_desc`, `image_status`, `service_image`, `icon`, `service_slug`, `status`, `meta_desc`, `meta_keyword`, `breadcrumb_status`, `custom_breadcrumb_image`, `order`, `created_at`, `updated_at`) VALUES
(5, 1, 'HRM', '<p style=\"background-color:#ffffff;\"><span style=\"font-size:16pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"><b>Netigian IT Web Development Services Overview</b></span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Netigian IT offers a comprehensive range of web development services designed to cater to your business\'s unique needs. From aesthetically pleasing and user-friendly websites to robust web applications, our skilled developers employ cutting-edge technologies combined with creative expertise to deliver exceptional digital solutions. Whether you\'re looking to establish an online presence, enhance your existing website, or build custom web solutions, Netigian IT provides personalized services to help your business thrive in the digital landscape.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12.5pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"><b>Web Development Services:</b></span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">1. </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">E-commerce Website:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Develop online stores with features like product catalogs, shopping carts, secure payment gateways, and customer management. </span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Integration with various payment systems, shipping modules, and customer support.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">2.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Real Estate Website:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Design platforms for listing properties, advanced search filters, and property management tools.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Include features such as property maps, virtual tours, and client management systems.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">3.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Restaurant Management Website:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Create websites for restaurants that include menu management, online ordering, reservations, and customer feedback systems.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Integrate with delivery services and offer mobile-friendly designs for easy access.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">4.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">3D Personal Portfolio Website:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Build visually stunning and interactive portfolios to showcase individual skills, projects, and achievements.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Utilize 3D graphics and animations to enhance the user experience and engagement.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">5.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Company Portfolio Website:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Develop professional and polished portfolio websites for companies to showcase their services, case studies, and client testimonials.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Include sections for team introductions, contact forms, and detailed service descriptions.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">6.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">School Management Website:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Create comprehensive school management systems with features for student enrollment, attendance tracking, grade management, and parent-teacher communication.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Include portals for students, teachers, and parents to access relevant information.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"><b>Web Development Technologies:</b></span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">1.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">WordPress:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Ideal for content-driven websites and blogs.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Customizable with a wide range of plugins and themes.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">2.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Shopify:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Specializes in ecommerce websites.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Offers robust ecommerce features and easy integration with various tools and apps.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">3.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Laravel:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">A PHP framework for building web applications.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Provides a robust structure and tools for building custom web applications with complex features.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">4.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Vue &amp; Nuxt JS:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Vue.js is a JavaScript framework for building user interfaces.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Nuxt.js extends Vue.js with server-side rendering capabilities, making it ideal for universal applications.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"><b>Web Development Common Features:</b></span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">1.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">User Authentication:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Secure login and registration systems.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Role-based access control to manage different user permissions.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">2.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Admin Panel:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Comprehensive dashboards for administrators to manage website content, user accounts, and system settings.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">3.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Search Functionality &amp; Filter Options:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Advanced search and filtering options to help users find content quickly and efficiently.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">4.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Navigation Menu:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Intuitive and responsive navigation menus for easy site navigation.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">5.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Responsive Design:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Ensure websites are mobile-friendly and provide a seamless experience across all devices.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">6.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">API Development:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Develop and integrate APIs to allow external systems to interact with your website.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">7.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Security Features:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Implement security measures such as SSL certificates, data encryption, and regular security audits to protect your website and user data.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">8.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Analytics and SEO Features:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Integrate tools for tracking website performance and user behavior.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Optimize websites for search engines to improve visibility and rankings.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">9.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Database Integration:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Connect websites to databases for efficient data management and retrieval.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Ensure robust and scalable database solutions.</span></p><p style=\"background-color:#ffffff;\"><b><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">10.</span><span style=\"font-size:12pt;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Custom Features:</span></b></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">Develop unique features tailored to your specific business needs and goals.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\">By combining these services and features, Netigian IT ensures that your web development project is not only tailored to your specific requirements but also stands out in the digital landscape, helping your business achieve its online objectives.</span></p><p style=\"background-color:#ffffff;\"><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span></p><p><span style=\"font-size:12pt;font-family:Arial, sans-serif;color:rgb(0,0,0);background-color:transparent;font-style:normal;text-decoration:none;\"> </span></p><p><span><br></span></p>', 'HRM platforms for attendance, payroll, recruitment, and employee management with streamlined workflows.', 'enable', 'demo-service-05.png', 'fas fa-user-tie', 'hrm', 1, '', '', 0, NULL, 5, '2024-03-22 10:47:26', '2026-08-18 07:54:57'),
(6, 1, 'POS (Point of Sale)', '<p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">At <strong>Netigian IT</strong> Services, we offer a premier Social Media Marketing (SMM) panel designed to provide comprehensive solutions for all your social media needs. Our platform is tailored to help individuals and businesses enhance their online presence through a range of high-quality services, ensuring you can effectively engage with your target audience across major social networks.</span></p>\r\n<p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Why Choose Netigian IT Services?</span></strong></p>\r\n<p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">User-Friendly Interface:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our platform is designed with simplicity in mind. Whether you are a social media novice or an experienced marketer, you will find our interface intuitive and easy to navigate, allowing you to manage your campaigns effortlessly.</span></p>\r\n<p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Competitive Pricing:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We offer some of the most competitive prices in the market without compromising on quality. Our affordable packages make it easy for businesses of all sizes to access top-tier social media marketing services.</span></p>\r\n<p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Reliable Customer Support:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> Our dedicated customer support team is available to assist you with any questions or issues you may encounter. We prioritize your satisfaction and are committed to providing timely and effective solutions to ensure your campaigns run smoothly.</span></p>\r\n<p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Quality Assurance:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> We pride ourselves on delivering high-quality services that produce real results. Our network of reliable sources ensures that the followers, likes, views, and comments you receive are of the highest standard, providing lasting value to your social media strategy.</span></p>\r\n<p><strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Our Commitment:</span></strong><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\"> At <strong>Netigian IT</strong> Services, we understand the importance of a strong social media presence in today\'s digital landscape. Our goal is to help you achieve significant growth and engagement on your preferred platforms, thereby enhancing your brand\'s visibility and influence. We continually update our services to align with the latest trends and algorithms, ensuring you stay ahead of the competition.</span></p>\r\n<p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">By choosing <strong>Netigian IT </strong>Services, you are partnering with a trusted provider dedicated to helping you succeed in the ever-evolving world of social media marketing. Boost your online presence, engage effectively with your audience, and drive meaningful growth with our comprehensive SMM solutions.</span></p>\r\n<p><span style=\"font-family:Arial, \'sans-serif\';color:#000000;\">Elevate your social media game with <strong>Netigian IT </strong>Services today and experience the difference our expertise can make.</span></p>', 'Point of sale systems for billing, inventory, sales tracking, and smooth in-store or retail operations.', 'enable', 'demo-service-06.png', 'fas fa-cash-register', 'pos', 1, '', '', 0, NULL, 6, '2024-03-22 10:58:40', '2026-08-18 10:02:38'),
(7, 4, 'ওয়েব ডিজাইন', '<div><div><div><div><div><div><p><strong>নেটিজিয়ান ওয়েব ডিজাইন পরিষেবার সংক্ষিপ্ত বিবরণ</strong></p><p>নেটিজিয়ান আইটি-তে আমরা ফ্রন্ট-এন্ড ওয়েব ডিজাইনে বিশেষজ্ঞ, যেখানে আমরা ভিজ্যুয়ালি আকর্ষণীয়, ব্যবহারকারী-বান্ধব এবং উচ্চ-দক্ষতার ওয়েবসাইট তৈরি করি যা দীর্ঘস্থায়ী ছাপ ফেলে। আমাদের লক্ষ্য আপনার অনলাইন উপস্থিতিকে উন্নত করা এবং শক্তিশালী ডিজাইন পরিষেবা সরবরাহ করা।</p><p><br></p><p><b>আমাদের ওয়েব ডিজাইন পরিষেবার প্রধান বৈশিষ্ট্যসমূহ:</b></p><p><strong>ভিজ্যুয়ালি আকর্ষণীয় ডিজাইন:</strong> আমরা এমন ডিজাইন তৈরি করি যা আপনার ব্র্যান্ডের পরিচয়কে ফুটিয়ে তোলে এবং দর্শকদের মুগ্ধ করে।</p><p><strong>ব্যবহারকারী-বান্ধব ইন্টারফেস:</strong> সহজ নেভিগেশন এবং ব্যবহারকারীর অভিজ্ঞতার উপর গুরুত্ব দিয়ে, আমরা নিশ্চিত করি যে ওয়েবসাইটটি ব্যবহারকারীর জন্য মসৃণ ও উপভোগ্য হয়।</p><p><strong>উচ্চ কার্যক্ষমতা:</strong> গতি, পারফরমেন্স এবং সব ডিভাইসে সাড়া দেওয়া নিশ্চিত করার জন্য ওয়েবসাইটগুলিকে অপটিমাইজ করা হয়।</p><p><br></p><p><b>আমরা অসাধারণ ডিজাইন আউটপুট নিশ্চিত করতে নিম্নলিখিত প্রযুক্তি ব্যবহার করি:</b></p><ul><li><strong>HTML5, CSS3, JavaScript:</strong> আধুনিক, রেস্পন্সিভ ওয়েবসাইট তৈরির জন্য মূল প্রযুক্তি।</li><li><br></li><li><strong>Vue.js এবং Nuxt.js:</strong> ইন্টারেক্টিভ এবং উচ্চ কার্যক্ষমতা সম্পন্ন ইউজার ইন্টারফেস এবং অ্যাপ্লিকেশন তৈরি করতে ব্যবহৃত ফ্রেমওয়ার্ক।</li></ul><p><br></p><p><b>আমাদের ওয়েব ডিজাইন পরিষেবার অন্তর্ভুক্ত মৌলিক বৈশিষ্ট্যসমূহ:</b></p><ul><li><strong>রেস্পন্সিভ ডিজাইন:</strong> ডেস্কটপ, ট্যাবলেট এবং মোবাইল ডিভাইসে নিখুঁত কার্যকারিতা এবং নান্দনিকতা নিশ্চিত করা।</li><li><br></li><li><strong>ব্যবহারকারী-কেন্দ্রিক ডিজাইন:</strong> আপনার শ্রোতাদের বুঝে এমন ডিজাইন সরবরাহ করা যা আকর্ষণীয় এবং রূপান্তরকে সহজ করে।</li><li><br></li><li><strong>ভিজ্যুয়াল ডিজাইনের উৎকর্ষতা:</strong> নান্দনিক উপাদান এবং ডিজাইনের নীতিগুলি প্রয়োগ করে ব্যবহারকারীর আগ্রহ এবং ব্র্যান্ডের উপলব্ধি বাড়ানো।</li></ul><p><br></p><p><b>আমরা ডিজাইন প্রক্রিয়ার প্রতিটি ধাপে ক্লায়েন্টের সন্তুষ্টি ও সহযোগিতাকে অগ্রাধিকার দিই:</b></p><ul><li><strong>কাস্টম সমাধান:</strong> আপনার ব্যবসার লক্ষ্য, শিল্পের মান এবং ব্র্যান্ডের পরিচয় অনুযায়ী ডিজাইন কাস্টমাইজ করা।</li><li><br></li><li><strong>স্বচ্ছ যোগাযোগ:</strong> স্পষ্ট ও খোলামেলা যোগাযোগ বজায় রাখা যাতে আপনার ভিশনটি সফলভাবে বাস্তবায়িত হয়।</li><li><br></li><li><strong>সময়মতো ডেলিভারি:</strong> গুণমান এবং কারিগরি মান বজায় রেখে প্রকল্পগুলি সময়মতো সম্পন্ন করা।</li></ul><p><br></p><p>নেটিজিয়ান আইটির সাথে যুক্ত হয়ে আপনার অনলাইন উপস্থিতি বদলে দিন আমাদের ফ্রন্ট-এন্ড ওয়েব ডিজাইন পরিষেবার মাধ্যমে। নতুন ওয়েবসাইট তৈরি হোক বা বিদ্যমান ওয়েবসাইটকে রিফ্রেশ করা হোক, আমরা আপনার ব্র্যান্ডকে উচ্চতর করতে এবং ডিজিটাল জগতে অসাধারণ ব্যবহারকারী অভিজ্ঞতা প্রদান করতে প্রতিশ্রুতিবদ্ধ।</p></div></div></div></div></div></div>', 'আমরা ফ্রন্ট-এন্ড ওয়েব ডিজাইনে বিশেষজ্ঞ, দৃশ্যত অত্যাশ্চর্য, ব্যবহারকারী-বান্ধব এবং উচ্চ-কর্মক্ষমতা ওয়েবসাইট তৈরি করতে নিবেদিত...', 'enable', 'demo-service-01.png', 'fas fa-desktop', 'web-design-development-netigian-it', 1, '', '', 0, NULL, 0, '2024-11-02 11:55:16', '2024-11-02 13:59:36'),
(8, 4, 'ডিজিটাল মার্কেটিং', '<p><strong>নেটিজিয়ান আইটি ডিজিটাল মার্কেটিং পরিষেবার সংক্ষিপ্ত বিবরণ</strong></p><p>ডিজিটাল যুগে, ব্যবসার বৃদ্ধি নিশ্চিত করতে একটি শক্তিশালী অনলাইন উপস্থিতি স্থাপন করা অত্যন্ত গুরুত্বপূর্ণ। নেটিজিয়ান আইটি ডিজিটাল মার্কেটিং পরিষেবাগুলি এমনভাবে ডিজাইন করা হয়েছে যা আপনার ব্র্যান্ডকে উজ্জ্বল করে এবং লক্ষ্যযুক্ত শ্রোতাদের সাথে কার্যকরভাবে সংযুক্ত করে।</p><p><br></p><p><strong>ডিজিটাল মার্কেটিং পরিষেবাসমূহ</strong></p><ul><li><p><strong>সার্চ ইঞ্জিন অপ্টিমাইজেশন (SEO):</strong> কৌশলগত অপ্টিমাইজেশন প্রযুক্তির মাধ্যমে আপনার ওয়েবসাইটের ভিজিবিলিটি বৃদ্ধি, সার্চ ইঞ্জিনে র‍্যাংকিং উন্নত এবং লক্ষ্যযুক্ত ট্রাফিক বাড়ানো।</p></li><li><p><strong>ফেসবুক বিজ্ঞাপন ক্যাম্পেইন:</strong> ফেসবুকে লক্ষ্যযুক্ত বিজ্ঞাপন ক্যাম্পেইন তৈরি ও পরিচালনা, নির্দিষ্ট জনসংখ্যায় পৌঁছানো, ব্র্যান্ড সচেতনতা বৃদ্ধি এবং কনভার্শন বাড়ানো।</p></li><li><p><strong>সোশ্যাল মিডিয়া মার্কেটিং:</strong> ফেসবুক, ইনস্টাগ্রাম, টুইটার এবং লিংকডইনের মতো প্ল্যাটফর্মে সোশ্যাল মিডিয়া কৌশল তৈরি এবং বাস্তবায়ন, আপনার শ্রোতাদের সাথে যোগাযোগ বৃদ্ধি, সম্পর্ক তৈরি এবং ব্র্যান্ডের প্রতি আনুগত্য বৃদ্ধি।</p></li><li><p><strong>কনটেন্ট মার্কেটিং:</strong> প্রাসঙ্গিক ও মূল্যবান কনটেন্ট (যেমন আর্টিকেল, ব্লগ, ভিডিও, ইনফোগ্রাফিক) তৈরি, যা একটি সুনির্দিষ্ট শ্রোতাকে আকৃষ্ট ও ধরে রাখতে সাহায্য করে এবং লাভজনক গ্রাহক অ্যাকশনকে উত্সাহিত করে।</p></li><li><p><strong>ইমেইল মার্কেটিং:</strong> ইমেইল ক্যাম্পেইনের মাধ্যমে লিড নরচার, পণ্য বা পরিষেবা প্রচার এবং গ্রাহকদের সাথে নিয়মিত যোগাযোগ বজায় রাখা, যা গ্রাহক ধরে রাখা এবং বিক্রয় বাড়ায়।</p></li><li><p><strong>ইউটিউব ভিডিও মার্কেটিং:</strong> ইউটিউবের মাধ্যমে প্রভাবশালী ভিডিও কনটেন্ট তৈরি করে ব্র্যান্ড প্রচার, লক্ষ্যযুক্ত বিজ্ঞাপন, ভিডিও SEO এবং শ্রোতাদের সাথে সম্পর্ক বৃদ্ধি।</p><p><br></p></li></ul><p><strong>ডিজিটাল মার্কেটিং প্রযুক্তি</strong></p><p>প্রভাবশালী ডিজিটাল মার্কেটিং ক্যাম্পেইন চালানোর জন্য আমরা উন্নত সরঞ্জাম এবং প্ল্যাটফর্ম ব্যবহার করি:</p><ul><li><strong>SEMrush:</strong> ওয়েবসাইটের পারফরম্যান্স অপ্টিমাইজ এবং কীওয়ার্ড র‍্যাংকিং ট্র্যাক করতে একটি বিস্তৃত SEO এবং প্রতিযোগিতা বিশ্লেষণ টুল।</li><li><br></li><li><strong>Google Search Console:</strong> ওয়েবসাইট ট্রাফিক, পারফরম্যান্স নিরীক্ষণ এবং সার্চ ইঞ্জিনের ভিজিবিলিটিকে প্রভাবিত করতে পারে এমন সমস্যাগুলি সমাধান করা।</li><li><br></li><li><strong>MailChimp:</strong> ইমেইল মার্কেটিং প্ল্যাটফর্ম, ইমেইল ক্যাম্পেইন ডিজাইন, পাঠানো এবং বিশ্লেষণের জন্য ব্যবহৃত।</li><li><br></li><li><strong>Google Keyword Planner:</strong> SEO এবং PPC ক্যাম্পেইনের জন্য প্রাসঙ্গিক কীওয়ার্ড গবেষণা এবং সনাক্ত করা।</li><li><br></li><li><strong>UberSuggest:</strong> কীওয়ার্ড রিসার্চ টুল যা সার্চ ভলিউম, প্রতিযোগিতা এবং সম্পর্কিত কীওয়ার্ড সম্পর্কে অন্তর্দৃষ্টি প্রদান করে।</li><li><br></li><li><strong>Hootsuite:</strong> সোশ্যাল মিডিয়া পোস্ট নির্ধারণ, এঙ্গেজমেন্ট পর্যবেক্ষণ এবং সোশ্যাল মিডিয়া পারফরম্যান্স বিশ্লেষণের জন্য ব্যবহৃত টুল।</li><li><br></li><li><strong>Google Analytics:</strong> ওয়েবসাইট ট্রাফিক, ব্যবহারকারীর আচরণ এবং কনভার্শন রেট ট্র্যাক এবং বিশ্লেষণ করা, যাতে মার্কেটিং কৌশলগুলিকে আরও উন্নত করা যায়।</li><li><br></li><li><strong>Facebook Ads Management:</strong> লক্ষ্যযুক্ত শ্রোতাদের কাছে পৌঁছানোর জন্য এবং মার্কেটিং উদ্দেশ্য অর্জনের জন্য ফেসবুক বিজ্ঞাপন ক্যাম্পেইন তৈরি, পরিচালনা এবং অপ্টিমাইজ করা।</li></ul><p><br></p><p><strong>ডিজিটাল মার্কেটিংয়ের সাধারণ বৈশিষ্ট্যসমূহ</strong></p><p>আমাদের ডিজিটাল মার্কেটিং পরিষেবাগুলি কার্যকারিতা এবং দক্ষতা সর্বাধিক করতে বিভিন্ন প্রয়োজনীয় বৈশিষ্ট্য অন্তর্ভুক্ত করে:</p><ul><li><strong>সোশ্যাল মিডিয়া ম্যানেজমেন্ট:</strong> আপনার শ্রোতাদের সাথে যোগাযোগ, মেনশন পর্যবেক্ষণ এবং ব্র্যান্ড অথরিটি এবং কমিউনিটি তৈরির জন্য সোশ্যাল মিডিয়া প্রোফাইল পরিচালনা।</li><li><br></li><li><strong>কনটেন্ট ম্যানেজমেন্ট:</strong> বিভিন্ন প্ল্যাটফর্মে মূল্যবান কনটেন্ট পরিকল্পনা, তৈরি এবং বিতরণ, যা আপনার লক্ষ্যযুক্ত শ্রোতাকে আকৃষ্ট, তথ্য প্রদান এবং এঙ্গেজ করে।</li><li><br></li><li><strong>ডিজিটাল বিজ্ঞাপন:</strong> সার্চ ইঞ্জিন, সোশ্যাল মিডিয়া এবং অন্যান্য ডিজিটাল প্ল্যাটফর্মে অর্থপ্রদান বিজ্ঞাপন কৌশল বাস্তবায়ন, যা ট্রাফিক এবং কনভার্শন বাড়ায়।</li><li><br></li><li><strong>গ্রাহক সম্পর্ক ব্যবস্থাপনা (CRM):</strong> গ্রাহকদের সাথে সম্পর্ক বজায় রাখা এবং ব্যক্তিগতকৃত যোগাযোগ এবং লক্ষ্যযুক্ত মার্কেটিং প্রচেষ্টার মাধ্যমে উন্নতি করা।</li><li><br></li><li><strong>অ্যানালিটিক্স ও রিপোর্টিং:</strong> ক্যাম্পেইন পারফরম্যান্স পরিমাপ, KPI ট্র্যাক এবং উন্নত ROI-এর জন্য মার্কেটিং কৌশলগুলিকে অপ্টিমাইজ করতে ডেটা অ্যানালিটিক্স ব্যবহার।</li><li><br></li><li><strong>মার্কেটিং অটোমেশন:</strong> ইমেইল ক্যাম্পেইন এবং সোশ্যাল মিডিয়া পোস্ট নির্ধারণের মতো পুনরাবৃত্তিমূলক কাজ এবং ওয়ার্কফ্লোকে স্বয়ংক্রিয় করা, যা দক্ষতা এবং স্কেলিবিলিটি উন্নত করে।</li></ul><p><br></p><p>এই পরিষেবা, প্রযুক্তি এবং বৈশিষ্ট্যগুলির সংমিশ্রণে, নেটিজিয়ান আইটি আপনার ডিজিটাল মার্কেটিং প্রচেষ্টাগুলিকে কৌশলগত, কার্যকরী এবং আপনার ব্যবসায়িক লক্ষ্যগুলির সাথে সামঞ্জস্যপূর্ণ করতে নিশ্চিত করে, যা অবশেষে বৃদ্ধি সাধন করে এবং আপনার অনলাইন উপস্থিতি শক্তিশালী করে।</p>', 'ডিজিটাল যুগে, ব্যবসায়িক বৃদ্ধির জন্য একটি কার্যকরী অনলাইন উপস্থিতি অত্যাবশ্যক। নেটিজিয়ানে, আমরা বিশেষজ্ঞ...', 'enable', 'demo-service-02.png', 'fas fa-ad', 'digital-marketing-2', 1, '', '', 0, NULL, 0, '2024-11-02 12:37:01', '2024-11-02 13:57:06'),
(9, 4, 'ভিডিও এডিটিং', '<p><strong>নেটিজিয়ান ভিডিও এডিটিং পরিষেবার সংক্ষিপ্ত বিবরণ</strong></p><p>নেটিজিয়ানে, আমরা কাঁচা ফুটেজকে এমন চমকপ্রদ ভিজ্যুয়াল গল্পে রূপান্তর করতে প্রতিশ্রুতিবদ্ধ যা দীর্ঘস্থায়ী প্রভাব ফেলে। আমাদের ভিডিও এডিটিং পরিষেবাগুলি আপনার কনটেন্টকে উজ্জ্বল করার জন্য ডিজাইন করা হয়েছে, এটি ব্যক্তিগত প্রকল্প, কর্পোরেট প্রেজেন্টেশন, মার্কেটিং প্রচারাভিযান, বা সোশ্যাল মিডিয়া এঙ্গেজমেন্টের জন্য হোক না কেন।</p><p><br></p><p><strong>ভিডিও এডিটিং পরিষেবাসমূহ</strong></p><ul><li><p><strong>ইউটিউব ভিডিও:</strong> আমরা আকর্ষণীয় ইউটিউব ভিডিও সম্পাদনায় বিশেষজ্ঞ, যা দর্শকদের মনোযোগ ধরে রাখে। আমাদের পরিষেবায় ইন্ট্রো/আউট্রো সিকোয়েন্স যোগ করা, ভিজ্যুয়াল এবং অডিও উন্নত করা এবং দর্শকের মনোযোগ ধরে রাখার জন্য আপনার কনটেন্ট অপটিমাইজ করা অন্তর্ভুক্ত রয়েছে।</p></li><li><p><strong>ফেসবুক ভিডিও:</strong> আমাদের দল সামাজিক মিডিয়ার জন্য বিশেষভাবে তৈরি ফেসবুক ভিডিও তৈরি করে। আমরা সংক্ষিপ্ত, প্রভাবশালী ক্লিপের ওপর জোর দিই যা দ্রুত মনোযোগ আকর্ষণ করে এবং ইন্টারঅ্যাকশনকে উৎসাহিত করে।</p></li><li><p><strong>শর্ট ভিডিও:</strong> আমরা বিভিন্ন প্ল্যাটফর্মের জন্য শর্ট ভিডিও সম্পাদনা করি, যা দ্রুত প্রচারনা, সামাজিক মিডিয়া পোস্ট বা ইভেন্ট হাইলাইটের জন্য উপযুক্ত। এই ভিডিওগুলি সংক্ষিপ্ত এবং কার্যকরীভাবে আপনার বার্তা পৌঁছে দিতে ডিজাইন করা হয়েছে।</p></li><li><p><strong>প্রমোশনাল ভিডিও:</strong> আমাদের প্রমোশনাল ভিডিও এডিটিং পরিষেবাগুলি আপনার পণ্য বা পরিষেবা বাজারজাত করতে সাহায্য করে। আমরা প্রভাবশালী ভিজ্যুয়াল, আকর্ষণীয় গল্প এবং পেশাদার এডিটিংকে একত্রিত করি, যা এঙ্গেজমেন্ট এবং কনভার্শন বাড়ায়।</p></li><li><p><strong>অ্যানিমেটেড ভিডিও:</strong> আমরা আপনার ধারণাগুলি অ্যানিমেটেড ভিডিওর মাধ্যমে জীবন্ত করে তুলি। আমাদের পরিষেবায় মোশন গ্রাফিক্স, অ্যানিমেটেড ইনফোগ্রাফিক এবং ক্যারেক্টার অ্যানিমেশন অন্তর্ভুক্ত রয়েছে, যা জটিল তথ্য উপস্থাপন বা গল্প বলার জন্য আকর্ষণীয় উপায় প্রদান করে।</p><p><br></p></li></ul><p><strong>ভিডিও এডিটিং প্রযুক্তি</strong></p><p>উচ্চমানের ভিডিও এডিটিং নিশ্চিত করতে আমরা উন্নত সরঞ্জাম এবং সংস্থান ব্যবহার করি:</p><ul><li><strong>Adobe Premiere Pro:</strong> পেশাদার ভিডিও এডিটিং সফটওয়্যার, যা মাল্টি-ট্র্যাক এডিটিং, এফেক্টস এবং কালার কারেকশনের মতো বিস্তৃত এডিটিং টাস্কের জন্য ব্যবহৃত হয়।</li><li><strong>Filmora:</strong> ব্যবহারকারী-বান্ধব ভিডিও এডিটিং টুল, যা ইফেক্ট, ট্রানজিশন এবং অডিও উন্নতির বিস্তৃত পরিসর প্রদান করে, যা নবীন এবং পেশাদার উভয়ের জন্যই উপযুক্ত।</li><li><strong>Shutterstock:</strong> স্টক ফুটেজ, মিউজিক এবং ইমেজের বিশাল সংগ্রহ প্রদান করে যা ভিডিও কনটেন্টকে সমৃদ্ধ করে।</li><li><strong>Adobe Stock:</strong> উচ্চমানের স্টক ভিডিও, অডিও এবং গ্রাফিক্স সরবরাহ করে, যা প্রকল্পগুলিতে সহজেই একত্রিত করা যায়।</li><li><strong>Freepik:</strong> ভিডিওতে ভিজ্যুয়াল এলিমেন্ট সংযোজনের জন্য বিভিন্ন ভেক্টর গ্রাফিক এবং ইমেজ সরবরাহ করে।</li></ul><p><br></p><p><strong>ভিডিও এডিটিংয়ের সাধারণ বৈশিষ্ট্যসমূহ</strong></p><ul><li><strong>ট্রিমিং এবং কাটিং:</strong> ফুটেজের অবাঞ্ছিত অংশ সরিয়ে নির্ভুল কাটিং এবং ট্রিমিংয়ের মাধ্যমে একটি ধারাবাহিক বর্ণনা তৈরি।</li><li><br></li><li><strong>ট্রানজিশন এবং টাইমলাইন ম্যানেজমেন্ট:</strong> ক্লিপগুলির মধ্যে মসৃণ ট্রানজিশন যোগ করা এবং ভিডিওর সময়কাল ঠিক রাখা।</li><li><br></li><li><strong>ইফেক্টস এবং ফিল্টার:</strong> ভিডিওর ভিজ্যুয়াল আকর্ষণ বাড়ানোর জন্য বিভিন্ন ইফেক্ট এবং ফিল্টার প্রয়োগ করা, যেমন কালার কারেকশন এবং গ্রেডিং।</li><li><br></li><li><strong>টেক্সট এবং টাইটেলস:</strong> ডায়নামিক টেক্সট এবং টাইটেল যোগ করা যা প্রসঙ্গ প্রদান, মূল পয়েন্ট তুলে ধরা বা ব্র্যান্ডিং এলিমেন্ট যোগ করতে সহায়ক।</li><li><br></li><li><strong>অডিও এডিটিং:</strong> অডিওর গুণমান উন্নত করা, ভিডিওর সাথে অডিওর সিঙ্ক করা এবং ব্যাকগ্রাউন্ড মিউজিক বা সাউন্ড ইফেক্ট যোগ করা।</li><li><br></li><li><strong>মাল্টি-ট্র্যাক এডিটিং:</strong> একাধিক ভিডিও এবং অডিও ট্র্যাক একইসাথে সম্পাদনা করা, যা লেয়ার করা কনটেন্টের প্রয়োজনীয় জটিল প্রকল্পগুলির জন্য আদর্শ।</li><li><br></li><li><strong>কি ফ্রেমিং:</strong> বিভিন্ন প্যারামিটারের জন্য কী ফ্রেম সেট করে অ্যানিমেশন এবং মোশন এফেক্ট তৈরি করা।</li><li><br></li><li><strong>ক্রোমা কি (গ্রিন স্ক্রিন):</strong> গ্রিন স্ক্রিন ব্যাকগ্রাউন্ড সরানো এবং পছন্দের ছবি বা ফুটেজ দিয়ে প্রতিস্থাপন করা।</li><li><br></li><li><strong>স্পিড কন্ট্রোল:</strong> স্লো-মোশন বা ফাস্ট-ফরওয়ার্ড ইফেক্ট তৈরি করতে ভিডিও ক্লিপের গতি নিয়ন্ত্রণ করা।</li><li><br></li><li><strong>স্টোরিবোর্ডিং:</strong> ভিডিও প্রকল্পের পরিকল্পনা এবং সংগঠন স্টোরিবোর্ডের মাধ্যমে করা, যা দৃশ্য এবং সিকোয়েন্সকে সম্পাদনার আগে ভিজ্যুয়ালাইজ করতে সহায়ক।</li><li><br></li><li><strong>সহযোগিতার সরঞ্জাম:</strong> এমন সরঞ্জাম ব্যবহার করা যা একাধিক দলীয় সদস্যকে একটি প্রকল্পে সহযোগিতা করতে, প্রতিক্রিয়া প্রদান করতে এবং কার্যকরভাবে সংশোধনী করতে সক্ষম করে।</li><li><br></li></ul><p>এই পরিষেবা, প্রযুক্তি এবং বৈশিষ্ট্যগুলির সমন্বয়ে, নেটিজিয়ান আপনার ভিডিও এডিটিং প্রকল্পগুলিকে পরিপাটি, পেশাদার এবং আপনার প্রয়োজনের সাথে পুরোপুরি সামঞ্জস্যপূর্ণ করে নিশ্চিত করে।</p>', 'আমাদের ভিডিও সম্পাদনা পরিষেবাগুলি আপনার বিষয়বস্তু হাইলাইট করার জন্য ডিজাইন করা হয়েছে, তা ব্যক্তিগত প্রকল্পের জন্যই হোক না কেন, কর্পোরেট...', 'enable', 'demo-service-03.png', 'fas fa-video', 'video-editing-2', 1, '', '', 0, NULL, 0, '2024-11-02 12:37:13', '2024-11-02 13:54:50'),
(10, 4, 'গ্রাফিক্স ডিজাইন', '<p><strong>নেটিজিয়ান আইটি গ্রাফিক ডিজাইন পরিষেবার সংক্ষিপ্ত বিবরণ</strong></p><p>নেটিজিয়ান আইটি আধুনিক গ্রাফিক ডিজাইন পরিষেবা প্রদান করে যা আপনার অনন্য প্রয়োজনের সাথে সামঞ্জস্যপূর্ণ। আমাদের দক্ষ ডিজাইনার দল সৃজনশীলতা এবং প্রযুক্তিগত দক্ষতার সমন্বয়ে চিত্তাকর্ষক ভিজ্যুয়াল সমাধান প্রদান করে যা আপনার ব্র্যান্ডের উপস্থিতি উন্নত করে। আপনি যদি আকর্ষণীয় লোগো, আকর্ষণীয় মার্কেটিং উপকরণ বা চোখ ধাঁধানো ওয়েবসাইট ডিজাইন প্রয়োজন করেন, আমরা পেশাদার এবং উদ্ভাবনী ডিজাইন প্রদান করি যা দীর্ঘস্থায়ী প্রভাব ফেলে। গুণমান, সময়ানুবর্তিতা এবং গ্রাহক সন্তুষ্টির ওপর বিশেষ জোর দিয়ে, নেটিজিয়ান আইটি আপনার সব ধরনের গ্রাফিক ডিজাইনের জন্য নির্ভরযোগ্য অংশীদার।</p><p><br></p><p><strong>গ্রাফিক ডিজাইন পরিষেবাসমূহ:</strong></p><ul><li><p><strong>UI/UX ডিজাইন:</strong> আমাদের UI/UX ডিজাইন পরিষেবাগুলি ওয়েবসাইট এবং মোবাইল অ্যাপ্লিকেশনের জন্য সহজে ব্যবহারযোগ্য এবং ব্যবহারকারী-বান্ধব ইন্টারফেস তৈরির ওপর জোর দেয়। আমরা নান্দনিকভাবে সুন্দর লেআউট এবং নির্বিঘ্ন নেভিগেশন ডিজাইনের মাধ্যমে ব্যবহারকারীর অভিজ্ঞতা উন্নত করি।</p></li><li><p><strong>লোগো ডিজাইন:</strong> আমরা অনন্য এবং স্মরণীয় লোগো তৈরি করি যা আপনার ব্র্যান্ড পরিচয়কে কার্যকরভাবে উপস্থাপন করে। আমাদের লোগোগুলি বহুমুখী এবং স্কেলেবল হয়, যাতে এগুলি বিভিন্ন প্ল্যাটফর্ম এবং মাধ্যমে দুর্দান্ত দেখায়।</p></li><li><p><strong>ইউটিউব থাম্বনেইল ডিজাইন:</strong> আমাদের ইউটিউব থাম্বনেইল ডিজাইন পরিষেবা দর্শকদের আকর্ষণ করে এমন চিত্তাকর্ষক ভিজ্যুয়াল এবং স্পষ্ট টেক্সট তৈরি করে, যা আপনার ভিডিও কনটেন্টকে আলাদা করে এবং আরও ক্লিক ও ভিউ বাড়াতে সাহায্য করে।</p></li><li><p><strong>সোশ্যাল পোস্ট ডিজাইন:</strong> আমরা আপনার ব্র্যান্ডের কণ্ঠস্বর এবং নান্দনিকতার সাথে সামঞ্জস্যপূর্ণ, বিভিন্ন সোশ্যাল মিডিয়া প্ল্যাটফর্মের জন্য আকর্ষণীয় এবং চিত্তাকর্ষক গ্রাফিক্স তৈরি করি, যা আপনার সোশ্যাল মিডিয়া উপস্থিতি এবং এঙ্গেজমেন্ট বৃদ্ধি করে।</p></li><li><p><strong>টি-শার্ট ডিজাইন:</strong> আমরা এমন চিত্তাকর্ষক এবং ট্রেন্ডি টি-শার্ট ডিজাইন তৈরি করি যা আপনার ব্র্যান্ড বা ব্যক্তিগত স্টাইলকে প্রতিফলিত করে। আমাদের ডিজাইনগুলি পরিধানের উপযোগীভাবে তৈরি, যা উচ্চমানের এবং প্রভাবশালী ভিজ্যুয়াল আকর্ষণ প্রদান করে।</p></li><li><p><strong>প্রোডাক্ট ডিজাইন:</strong> আমাদের প্রোডাক্ট ডিজাইন পরিষেবাগুলি বিভিন্ন পণ্যের জন্য নান্দনিক এবং কার্যকর ডিজাইন তৈরি করতে ফোকাস করে, যা আকর্ষণীয়, ব্যবহারকারী-বান্ধব এবং বাজারের উপযোগী হয়।</p></li><li><p><strong>ই-কমার্স প্রোডাক্ট রিটাচিং:</strong> আমরা আপনার পণ্যের ছবিগুলির ভিজ্যুয়াল আকর্ষণ বাড়াই, যাতে অনলাইন শপারদের কাছে এটি পেশাদার এবং আকর্ষণীয় দেখায়। এই পরিষেবায় রঙের সংশোধন, ব্যাকগ্রাউন্ড অপসারণ এবং অন্যান্য রিটাচিং কৌশল অন্তর্ভুক্ত রয়েছে।</p><p><br></p></li></ul><p><strong>গ্রাফিক ডিজাইন প্রযুক্তি</strong></p><p>উচ্চমানের ডিজাইন সরবরাহ করতে, আমরা বেশ কয়েকটি উন্নত টুল এবং প্রযুক্তি ব্যবহার করি:</p><ul><li><strong>Figma:</strong> সহযোগিতামূলক UI/UX ডিজাইনের জন্য আদর্শ, যা আমাদের ইন্টারেক্টিভ এবং রেস্পন্সিভ ডিজাইন তৈরি করতে সক্ষম করে।</li><li><br></li><li><strong>Adobe Photoshop:</strong> ছবির সম্পাদনা, ফটো রিটাচিং এবং জটিল গ্রাফিক তৈরির জন্য ব্যবহৃত।</li><li><br></li><li><strong>Adobe Illustrator:</strong> নির্ভুল এবং স্কেলেবল ভেক্টর গ্রাফিক্স, লোগো এবং ইলাস্ট্রেশন তৈরির জন্য আদর্শ।</li><li><br></li><li><strong>Canva Pro:</strong> সোশ্যাল মিডিয়া গ্রাফিক্স, প্রেজেন্টেশন এবং অন্যান্য মার্কেটিং উপকরণের জন্য একটি বহুমুখী টুল।</li><li><br></li><li><strong>Envato Elements:</strong> টেমপ্লেট, গ্রাফিক্স এবং অন্যান্য উপকরণের বিশাল সংগ্রহ যা আমাদের ডিজাইন প্রকল্পকে সমৃদ্ধ করে।</li><li><br></li><li><strong>Freepik:</strong> আমাদের ডিজাইনে উচ্চমানের ছবি, ভেক্টর এবং ইলাস্ট্রেশন সংযোজনের জন্য একটি সমৃদ্ধ উৎস।</li><li><br></li><li><strong>Pinterest Analytics:</strong> ডিজাইন ট্রেন্ড বুঝতে এবং চিত্তাকর্ষক কনটেন্ট তৈরি করার জন্য অনুপ্রেরণা সংগ্রহের জন্য সহায়ক।</li><li><br></li><li><strong>Behance:</strong> আমাদের কাজ প্রদর্শন এবং অন্যান্য ডিজাইনারের পোর্টফোলিও থেকে অনুপ্রেরণা অর্জনের প্ল্যাটফর্ম।</li></ul><p><br></p><p><strong>গ্রাফিক ডিজাইনের সাধারণ বৈশিষ্ট্যসমূহ:</strong></p><p>আমাদের গ্রাফিক ডিজাইন পরিষেবাগুলি বিভিন্ন বৈশিষ্ট্য অন্তর্ভুক্ত করে যা উচ্চমানের ফলাফল নিশ্চিত করে:</p><ul><li><strong>লেয়ারিং এবং টেক্সট সম্পাদনা:</strong> বিভিন্ন স্তরের মাধ্যমে জটিল ডিজাইন তৈরি এবং নির্ভুল টেক্সট সমন্বয়।</li><li><br></li><li><strong>ছবি সম্পাদনা:</strong> ছবি উন্নত এবং প্রয়োজনীয় ভিজ্যুয়াল প্রভাব অর্জনের জন্য ম্যানিপুলেশন।</li><li><br></li><li><strong>ভেক্টর গ্রাফিক্স:</strong> যে কোনো সাইজে গুণমান বজায় রাখা যায় এমন স্কেলেবল গ্রাফিক তৈরি।</li><li><br></li><li><strong>কালার ম্যানেজমেন্ট:</strong> বিভিন্ন মাধ্যমে সঠিক রঙ পুনরুত্পাদন নিশ্চিত করা।</li><li><br></li><li><strong>অ্যালাইনমেন্ট এবং ডিস্ট্রিবিউশন:</strong> সুষম লেআউটের জন্য ডিজাইন উপাদানগুলির নির্ভুল অ্যালাইনমেন্ট এবং বিতরণ।</li><li><br></li><li><strong>এক্সপোর্টিং এবং ফাইল ফরম্যাট:</strong> ওয়েব, প্রিন্ট এবং অন্যান্য ব্যবহারের জন্য বিভিন্ন ফরম্যাটে ডিজাইন এক্সপোর্ট।</li><li><br></li><li><strong>মাস্কিং এবং ক্লিপিং:</strong> ছবি থেকে অংশ আলাদা করে এবং ম্যানিপুলেশন করার উন্নত কৌশল।</li><li><br></li><li><strong>ড্রয়িং এবং পেইন্টিং:</strong> ডিজিটাল টুল ব্যবহার করে মৌলিক ইলাস্ট্রেশন এবং শিল্পকর্ম তৈরি।</li><li><br></li><li><strong>সহযোগিতার টুল:</strong> টিম সহযোগিতা এবং গ্রাহকের প্রতিক্রিয়া প্রদানকারী টুলের ব্যবহার।</li><li><br></li><li><strong>এফেক্ট এবং ফিল্টার:</strong> ডিজাইনের ভিজ্যুয়াল আকর্ষণ বাড়ানোর জন্য বিভিন্ন এফেক্ট এবং ফিল্টার প্রয়োগ।</li></ul><p><br></p><p>এই পরিষেবা, প্রযুক্তি এবং বৈশিষ্ট্যের সমন্বয়ে, নেটিজিয়ান আইটি নিশ্চিত করে যে আপনার গ্রাফিক ডিজাইন প্রকল্পগুলি নান্দনিকভাবে চিত্তাকর্ষক এবং আপনার ব্র্যান্ডের লক্ষ্য এবং প্রয়োজনের সাথে সামঞ্জস্যপূর্ণ।</p>', 'আমরা আমাদের প্রতিভাবান ডিজাইনারদের দলের সাথে আপনার অনন্য চাহিদা পূরণের জন্য তৈরি করা অত্যাধুনিক গ্রাফিক ডিজাইন পরিষেবা অফার করি...', 'enable', 'demo-service-04.png', 'fab fa-lastfm-square', 'graphic-design-2', 1, '', '', 0, NULL, 0, '2024-11-02 12:37:22', '2024-11-02 13:50:23'),
(11, 4, 'এসএমএম প্যানেল', '<p><strong>নেটিজিয়ান আইটি সার্ভিসেসে সোশ্যাল মিডিয়া মার্কেটিং প্যানেলের সংক্ষিপ্ত বিবরণ</strong></p><p>নেটিজিয়ান আইটি সার্ভিসেসে আমরা একটি প্রিমিয়াম সোশ্যাল মিডিয়া মার্কেটিং (এসএমএম) প্যানেল অফার করি যা আপনার সমস্ত সোশ্যাল মিডিয়া চাহিদার জন্য পূর্ণাঙ্গ সমাধান প্রদান করে। আমাদের প্ল্যাটফর্মটি এমনভাবে ডিজাইন করা হয়েছে যা ব্যক্তিগত এবং ব্যবসায়িক ব্যবহারকারীদের অনলাইন উপস্থিতি উন্নত করতে সহায়তা করে, উচ্চমানের পরিষেবা প্রদান করে যাতে আপনি প্রধান সোশ্যাল নেটওয়ার্কে আপনার লক্ষ্যমাত্রা অডিয়েন্সের সাথে কার্যকরভাবে সংযুক্ত থাকতে পারেন।</p><p><br></p><p><strong>নেটিজিয়ান আইটি সার্ভিসেস কেন বেছে নিবেন?</strong></p><ul><li><p><strong>ব্যবহারকারী-বান্ধব ইন্টারফেস:</strong> আমাদের প্ল্যাটফর্মটি সহজ ব্যবহারের জন্য ডিজাইন করা হয়েছে। আপনি যদি সোশ্যাল মিডিয়ার নতুন ব্যবহারকারী হন বা একজন অভিজ্ঞ মার্কেটার হন, আমাদের ইন্টারফেসটি আপনাকে সহজে এবং নির্বিঘ্নে ক্যাম্পেইন পরিচালনা করতে সহায়তা করবে।</p></li><li><p><strong>প্রতিযোগিতামূলক মূল্য:</strong> আমরা বাজারে সবচেয়ে প্রতিযোগিতামূলক মূল্যে পরিষেবা প্রদান করি, গুণমানের সাথে আপস না করে। আমাদের সাশ্রয়ী মূল্যের প্যাকেজগুলি ছোট থেকে বড় সমস্ত ব্যবসার জন্য উচ্চমানের সোশ্যাল মিডিয়া মার্কেটিং পরিষেবাগুলিতে প্রবেশাধিকার সহজ করে তোলে।</p></li><li><p><strong>নির্ভরযোগ্য গ্রাহক সহায়তা:</strong> আমাদের নিবেদিত গ্রাহক সহায়ক দল আপনার যে কোনও প্রশ্ন বা সমস্যার জন্য সবসময় প্রস্তুত। আমরা আপনার সন্তুষ্টিকে সর্বোচ্চ অগ্রাধিকার দিই এবং আপনার ক্যাম্পেইন নির্বিঘ্নে চালানোর জন্য সময়মতো এবং কার্যকর সমাধান প্রদানে প্রতিশ্রুতিবদ্ধ।</p></li><li><p><strong>গুণগত মানের নিশ্চয়তা:</strong> আমরা উচ্চমানের পরিষেবা প্রদানের জন্য গর্বিত, যা প্রকৃত ফলাফল দেয়। আমাদের নির্ভরযোগ্য উৎসগুলির মাধ্যমে আপনি যে ফলোয়ার, লাইক, ভিউ এবং মন্তব্যগুলি পাবেন সেগুলি সর্বোচ্চ মানের, যা আপনার সোশ্যাল মিডিয়া কৌশলে স্থায়ী মূল্য প্রদান করে।</p><p><br></p></li></ul><p><strong>আমাদের প্রতিশ্রুতি:</strong> নেটিজিয়ান আইটি সার্ভিসেসে আমরা জানি যে আজকের ডিজিটাল দুনিয়ায় শক্তিশালী সোশ্যাল মিডিয়া উপস্থিতি কতটা গুরুত্বপূর্ণ। আমাদের লক্ষ্য হলো আপনার পছন্দের প্ল্যাটফর্মে উল্লেখযোগ্য বৃদ্ধি এবং এঙ্গেজমেন্ট অর্জন করতে সহায়তা করা, যা আপনার ব্র্যান্ডের ভিজিবিলিটি এবং প্রভাবকে বাড়ায়। আমরা সর্বদা আমাদের পরিষেবাগুলি সর্বশেষ ট্রেন্ড এবং অ্যালগরিদমের সাথে সামঞ্জস্যপূর্ণ রাখতে আপডেট করি, যাতে আপনি প্রতিযোগিতায় এগিয়ে থাকতে পারেন।</p><p><br></p><p>নেটিজিয়ান আইটি সার্ভিসেস বেছে নিয়ে আপনি এমন একটি বিশ্বস্ত পরিষেবা প্রদানকারীর সাথে পার্টনার হচ্ছেন, যারা আপনাকে সোশ্যাল মিডিয়া মার্কেটিংয়ের ক্রমবর্ধমান জগতে সাফল্য অর্জনে সহায়তা করতে নিবেদিত। আমাদের পূর্ণাঙ্গ এসএমএম সমাধানগুলির মাধ্যমে আপনার অনলাইন উপস্থিতি বৃদ্ধি করুন, অডিয়েন্সের সাথে কার্যকরভাবে যুক্ত থাকুন এবং অর্থবহ বৃদ্ধি অর্জন করুন।</p><p>আজই নেটিজিয়ান আইটি সার্ভিসেসের সাথে আপনার সোশ্যাল মিডিয়া গেমকে আরও উন্নত করুন এবং আমাদের দক্ষতার মাধ্যমে পার্থক্য অনুভব করুন।</p>', 'আমরা একটি প্রিমিয়ার এসএমএম (সোশ্যাল মিডিয়া মার্কেটিং) প্যানেল অফার করি যা সকলের জন্য ব্যাপক সমাধান প্রদান করে...', 'enable', 'demo-service-05.png', 'fas fa-dolly', 'smm-panel', 1, '', '', 0, NULL, 0, '2024-11-02 12:37:39', '2024-11-02 13:46:48');
INSERT INTO `services` (`id`, `language_id`, `title`, `desc`, `short_desc`, `image_status`, `service_image`, `icon`, `service_slug`, `status`, `meta_desc`, `meta_keyword`, `breadcrumb_status`, `custom_breadcrumb_image`, `order`, `created_at`, `updated_at`) VALUES
(12, 4, 'ওয়েব ডেভেলপমেন্ট', '<p><strong>নেটিজিয়ান আইটি ওয়েব ডেভেলপমেন্ট পরিষেবার সংক্ষিপ্ত বিবরণ</strong></p><p>নেটিজিয়ান আইটি এমন একটি বিস্তৃত ওয়েব ডেভেলপমেন্ট পরিষেবা প্রদান করে যা আপনার ব্যবসার বিশেষ প্রয়োজনের সাথে মানানসই। নান্দনিক, ব্যবহারকারী-বান্ধব ওয়েবসাইট থেকে শুরু করে শক্তিশালী ওয়েব অ্যাপ্লিকেশন পর্যন্ত, আমাদের দক্ষ ডেভেলপাররা আধুনিক প্রযুক্তি এবং সৃজনশীল দক্ষতার সমন্বয়ে চমৎকার ডিজিটাল সমাধান প্রদান করেন। আপনি যদি অনলাইন উপস্থিতি তৈরি করতে চান, বিদ্যমান ওয়েবসাইট উন্নত করতে চান, বা কাস্টম ওয়েব সমাধান নির্মাণ করতে চান, নেটিজিয়ান আইটি আপনার ব্যবসার উন্নতির জন্য ব্যক্তিগতকৃত পরিষেবা প্রদান করে।</p><p><br></p><p><strong>ওয়েব ডেভেলপমেন্ট পরিষেবাসমূহ:</strong></p><ol><li><p><strong>ই-কমার্স ওয়েবসাইট:</strong></p><p>প্রোডাক্ট ক্যাটালগ, শপিং কার্ট, নিরাপদ পেমেন্ট গেটওয়ে এবং কাস্টমার ম্যানেজমেন্টের মতো বৈশিষ্ট্য সহ অনলাইন স্টোর তৈরি।</p><p>বিভিন্ন পেমেন্ট সিস্টেম, শিপিং মডিউল এবং গ্রাহক সাপোর্ট ইন্টিগ্রেশন।</p></li><li><p><strong>রিয়েল এস্টেট ওয়েবসাইট:</strong></p><p>সম্পত্তি তালিকা, উন্নত সার্চ ফিল্টার এবং প্রপার্টি ম্যানেজমেন্ট টুলের জন্য প্ল্যাটফর্ম ডিজাইন।</p><p>সম্পত্তি ম্যাপ, ভার্চুয়াল ট্যুর এবং ক্লায়েন্ট ম্যানেজমেন্ট সিস্টেমের মতো বৈশিষ্ট্য অন্তর্ভুক্ত।</p></li><li><p><strong>রেস্টুরেন্ট ম্যানেজমেন্ট ওয়েবসাইট:</strong></p><p>মেনু ম্যানেজমেন্ট, অনলাইন অর্ডারিং, রিজার্ভেশন এবং গ্রাহক প্রতিক্রিয়া সিস্টেম সহ রেস্টুরেন্টের জন্য ওয়েবসাইট তৈরি।</p><p>ডেলিভারি সার্ভিসের সাথে ইন্টিগ্রেশন এবং সহজ অ্যাক্সেসের জন্য মোবাইল-ফ্রেন্ডলি ডিজাইন।</p></li><li><p><strong>৩ডি ব্যক্তিগত পোর্টফোলিও ওয়েবসাইট:</strong></p><p>ব্যক্তিগত দক্ষতা, প্রকল্প এবং অর্জন প্রদর্শনের জন্য ভিজ্যুয়ালি আকর্ষণীয় এবং ইন্টারেক্টিভ পোর্টফোলিও তৈরি।</p><p>ব্যবহারকারীর অভিজ্ঞতা এবং আগ্রহ বাড়ানোর জন্য ৩ডি গ্রাফিক্স এবং অ্যানিমেশন ব্যবহার।</p></li><li><p><strong>কোম্পানির পোর্টফোলিও ওয়েবসাইট:</strong></p><p>কোম্পানির পরিষেবা, কেস স্টাডি এবং ক্লায়েন্ট টেস্টিমোনিয়াল প্রদর্শনের জন্য পেশাদার পোর্টফোলিও ওয়েবসাইট তৈরি।</p><p>টিম পরিচিতি, যোগাযোগ ফর্ম এবং পরিষেবার বিস্তারিত বিবরণের জন্য বিভাগ অন্তর্ভুক্ত।</p></li><li><p><strong>স্কুল ম্যানেজমেন্ট ওয়েবসাইট:</strong></p><p>ছাত্র ভর্তি, উপস্থিতি ট্র্যাকিং, গ্রেড ম্যানেজমেন্ট এবং অভিভাবক-শিক্ষক যোগাযোগের জন্য সম্পূর্ণ স্কুল ম্যানেজমেন্ট সিস্টেম তৈরি।</p><p>ছাত্র, শিক্ষক এবং অভিভাবকদের প্রাসঙ্গিক তথ্য অ্যাক্সেসের জন্য পোর্টাল অন্তর্ভুক্ত।</p></li></ol><p><strong>ওয়েব ডেভেলপমেন্ট প্রযুক্তি:</strong></p><ol><li><p><strong>ওয়ার্ডপ্রেস:</strong></p><p>কন্টেন্ট ভিত্তিক ওয়েবসাইট এবং ব্লগের জন্য উপযুক্ত।</p><p>বিভিন্ন প্লাগইন এবং থিমের মাধ্যমে কাস্টমাইজ করা যায়।</p></li><li><p><strong>শপিফাই:</strong></p><p>ই-কমার্স ওয়েবসাইটের জন্য বিশেষায়িত।</p><p>শক্তিশালী ই-কমার্স বৈশিষ্ট্য এবং বিভিন্ন টুল ও অ্যাপের সাথে সহজ ইন্টিগ্রেশন প্রদান করে।</p></li><li><p><strong>লারাভেল:</strong></p><p>ওয়েব অ্যাপ্লিকেশন তৈরির জন্য একটি পিএইচপি ফ্রেমওয়ার্ক।</p><p>জটিল বৈশিষ্ট্য সহ কাস্টম ওয়েব অ্যাপ্লিকেশন তৈরি করার জন্য একটি শক্তিশালী কাঠামো ও টুলস প্রদান করে।</p></li><li><p><strong>ভিউ ও ন্যাক্সট জেএস:</strong></p><p>ভিউ.জেএস ব্যবহারকারী ইন্টারফেস তৈরির জন্য একটি জাভাস্ক্রিপ্ট ফ্রেমওয়ার্ক।</p><p>ন্যাক্সট.জেএস সার্ভার-সাইড রেন্ডারিং ক্ষমতা যোগ করে, যা ইউনিভার্সাল অ্যাপ্লিকেশনের জন্য আদর্শ।</p></li></ol><p><strong>ওয়েব ডেভেলপমেন্টের সাধারণ বৈশিষ্ট্যসমূহ:</strong></p><ol><li><p><strong>ইউজার অথেন্টিকেশন:</strong></p><p>নিরাপদ লগইন এবং রেজিস্ট্রেশন সিস্টেম।</p><p>বিভিন্ন ব্যবহারকারীর অনুমতি পরিচালনার জন্য ভূমিকা-ভিত্তিক অ্যাক্সেস নিয়ন্ত্রণ।</p></li><li><p><strong>অ্যাডমিন প্যানেল:</strong></p><p>প্রশাসকদের জন্য ওয়েবসাইট কন্টেন্ট, ব্যবহারকারী অ্যাকাউন্ট এবং সিস্টেম সেটিংস ব্যবস্থাপনার জন্য সম্পূর্ণ ড্যাশবোর্ড।</p></li><li><p><strong>সার্চ ফাংশনালিটি ও ফিল্টার অপশন:</strong></p><p>ব্যবহারকারীদের দ্রুত এবং সহজে কন্টেন্ট খুঁজে পেতে উন্নত সার্চ এবং ফিল্টারিং অপশন।</p></li><li><p><strong>নেভিগেশন মেনু:</strong></p><p>সহজ এবং রেস্পন্সিভ নেভিগেশন মেনু, যা সাইটে সহজ নেভিগেশন নিশ্চিত করে।</p></li><li><p><strong>রেস্পন্সিভ ডিজাইন:</strong></p><p>ওয়েবসাইটগুলো মোবাইল-ফ্রেন্ডলি এবং সব ডিভাইসে মসৃণ অভিজ্ঞতা প্রদান করে।</p></li><li><p><strong>এপিআই ডেভেলপমেন্ট:</strong></p><p>ওয়েবসাইটের সাথে বাহ্যিক সিস্টেমের ইন্টারঅ্যাকশন নিশ্চিত করতে এপিআই তৈরি এবং ইন্টিগ্রেশন।</p></li><li><p><strong>সিকিউরিটি ফিচার:</strong></p><p>এসএসএল সার্টিফিকেট, ডেটা এনক্রিপশন এবং নিয়মিত সিকিউরিটি অডিটের মতো সুরক্ষা ব্যবস্থা প্রয়োগ করে ওয়েবসাইট ও ব্যবহারকারীর ডেটা সুরক্ষিত করা।</p></li><li><p><strong>অ্যানালিটিক্স এবং এসইও ফিচার:</strong></p><p>ওয়েবসাইট পারফরমেন্স এবং ব্যবহারকারীর আচরণ ট্র্যাক করার জন্য টুলস ইন্টিগ্রেট করা।</p><p>সার্চ ইঞ্জিনের জন্য ওয়েবসাইটগুলো অপ্টিমাইজ করে ভিজিবিলিটি এবং র‍্যাংকিং বৃদ্ধি করা।</p></li><li><p><strong>ডাটাবেজ ইন্টিগ্রেশন:</strong></p><p>ডেটা ব্যবস্থাপনা এবং রিট্রিভালের জন্য ডাটাবেজের সাথে ওয়েবসাইট সংযুক্ত করা।</p><p>নির্ভরযোগ্য এবং স্কেলযোগ্য ডাটাবেজ সমাধান নিশ্চিত করা।</p></li><li><p><strong>কাস্টম ফিচার: </strong>আপনার বিশেষ ব্যবসার প্রয়োজন এবং লক্ষ্য অনুযায়ী অনন্য বৈশিষ্ট্য তৈরি।</p><p><br></p></li></ol><p>এই পরিষেবা এবং বৈশিষ্ট্যগুলির সমন্বয়ে নেটিজিয়ান আইটি নিশ্চিত করে যে আপনার ওয়েব ডেভেলপমেন্ট প্রকল্পটি আপনার নির্দিষ্ট প্রয়োজনের সাথে মানানসই এবং ডিজিটাল দুনিয়ায় আলাদা করে তুলে, আপনার ব্যবসার অনলাইন লক্ষ্য অর্জনে সহায়ক হয়।</p>', 'আপনার ব্যবসার চাহিদা পূরণের জন্য তৈরি করা ওয়েব ডেভেলপমেন্ট পরিষেবা। দৃশ্যত অত্যাশ্চর্য তৈরি করা থেকে শুরু করে ওয়েব অ্যাপ্লিকেশন তৈরি করা...', 'enable', 'demo-service-06.png', 'fab fa-asymmetrik', 'web-development-2', 1, '', '', 0, NULL, 0, '2024-11-02 12:37:49', '2024-11-02 13:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `desc` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`id`, `service_id`, `title`, `desc`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Services Name', 'Web Design', 0, '2024-02-08 16:16:42', '2024-02-08 16:36:11'),
(2, 1, 'Service Industry', 'Web,App', 1, '2024-02-08 16:32:41', '2024-02-08 16:35:58'),
(3, 1, 'Service Duration', '2 Weeks', 2, '2024-02-08 16:33:04', '2024-02-08 16:37:17'),
(4, 1, 'Service Total Hours', '336 Hour', 3, '2024-02-08 16:36:48', '2024-02-08 16:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `service_paginates`
--

CREATE TABLE `service_paginates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `homepage_item` int(11) NOT NULL DEFAULT 4,
  `paginate` int(11) NOT NULL DEFAULT 6,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Services', 'Our Services', '2024-02-08 16:10:44', '2024-02-08 16:10:44'),
(2, 4, 'সার্ভিসেস', 'আমাদের সার্ভিস গুলো', '2024-11-02 11:52:49', '2024-11-02 11:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1dOQJZVh2prEI231Bd3IJxrV5hsavmOYTFWR6Nu6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaFVjc2JHMHhKdUZ4REVsS0s3bU5sbW1TSDlpbmk3TU5VaGpkWUw4SCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728331),
('4t75Y51gpGBoEsmtjI3cf0DHnEj7yY4UxWUlPTAl', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IlQ5VGpCZk03S0VoSTJHbEpxeGNPaUI1ZGwzbWZhbXU3bExibG13NVIiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImI0MTQxOWVkYjA2OTI3ODE5MGRmNjZlNDdmYjhhZjljYmI3OGRhYTlkZWQ4M2JhOGRmNDc2ZTY4OGFmNTQ3NDgiO3M6MjU6Imxhbmd1YWdlX2lkX2Zyb21fZHJvcGRvd24iO2k6MTtzOjI3OiJsYW5ndWFnZV9uYW1lX2Zyb21fZHJvcGRvd24iO3M6NzoiRW5nbGlzaCI7czoyNzoibGFuZ3VhZ2VfY29kZV9mcm9tX2Ryb3Bkb3duIjtzOjI6ImVuIjtzOjMyOiJsYW5ndWFnZV9kaXJlY3Rpb25fZnJvbV9kcm9wZG93biI7aTowO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcGFnZSI7czo1OiJyb3V0ZSI7czoxMDoicGFnZS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2NDoiYjQxNDE5ZWRiMDY5Mjc4MTkwZGY2NmU0N2ZiOGFmOWNiYjc4ZGFhOWRlZDgzYmE4ZGY0NzZlNjg4YWY1NDc0OCI7fQ==', 1787748500),
('8cSucrpKhw1wcyPF7qfFmGCEvjwBMimDLJ2TpONo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQzZydzdya0tlM0FFZXNnVkREaml4ZGtram1mVjNKRnRsYUZXaFZyMiI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787748478),
('9rruhHAGEbnRMDLpuUpA5kAguJXxyTNuvsW73mvQ', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiTTRKa25kZG41ZXNsQzI3REVxazlBVXE4MGRoNXhIUGhyajNWMXJ2MiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjQ6ImI0MTQxOWVkYjA2OTI3ODE5MGRmNjZlNDdmYjhhZjljYmI3OGRhYTlkZWQ4M2JhOGRmNDc2ZTY4OGFmNTQ3NDgiO3M6MjU6Imxhbmd1YWdlX2lkX2Zyb21fZHJvcGRvd24iO2k6MTtzOjI3OiJsYW5ndWFnZV9uYW1lX2Zyb21fZHJvcGRvd24iO3M6NzoiRW5nbGlzaCI7czoyNzoibGFuZ3VhZ2VfY29kZV9mcm9tX2Ryb3Bkb3duIjtzOjI6ImVuIjtzOjMyOiJsYW5ndWFnZV9kaXJlY3Rpb25fZnJvbV9kcm9wZG93biI7aTowO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcGFnZSI7czo1OiJyb3V0ZSI7czoxMDoicGFnZS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728737),
('ACXvomPFYchUJluLcOYArxbyGHfSAZScG4wVnTtQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoia3hIaE5GWVcweHZlT2o5VlkydG1PQ0FyZUFkWHY1SnlJcTU5UHc2cSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728330),
('al4Hg4sgzwbM4tlTtc3PzgOqBd4yjhsaJ7NF4WcG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoidUw5NWZXUFRzOFAzYkRKVXlNNjcxUGtWMTdhNUpWOUdkenpDWFZTeSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728332),
('bABRBqg1c5pkfF2UGkWewA5T3J8a70DwiMjR6zHn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSktVRmJEckNmUU9nYkZnSzhsZ0NXYXI2Y2RvR3dFNzRNbTFDcGxTdSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738789),
('COXGN98lUNeCqppHIHHNne4DJuU0DudLOaZo2KiJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQTlIUFNVWDBMd3Rqd2RBNHpkbVNZOHM3SnBaVWwzZ3BvVzVJN2FocSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728328),
('DiBmRru8HCBWJhUQYBIAwaNxgXJxSyyuEoBJueWT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRms1YnZMZ3I0ZjlJVEloOFM0YWRSV3RaOFFsVEFtVERONWNPbVhrNSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738791),
('EGuMz4mB1I3x3bVYlcSVnFlbU5ops8JaSLWt6Qtl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaVNpVHp6M2RuOWhoSWxqQ0F6UVBGeDhkNDh6eU5rVnBUR1BPUHZoUSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738787),
('gAdC4tAP24lhGa5K0nCKk0uV6TVBuGVcuD64ALyo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZlh4QUR3STVyUzM0amRIRGVqcGFFYWthT1dkVnN5VzVnUnhMUGxaeCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787748479),
('gI8zGcdpaOVGkoc1IPuKTM3D5cxaPnJknol0E5sV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibUtta0lZMzBWZnMxNkNsR0hmc3Y1VGU5dExkNktWTXI4VExaRkJmdCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738790),
('GsLftdGLSzycM7aP1dHJfMHUI1qtd5tVSb5Nxw5P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUmhxb3I0MGd0WG5tZVp0WEttQ2F6UERFZFJBTmdGc1U5TU5HS2c5OSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738788),
('IM7VcRGf03hYHDQVzREnpSc3nzQVZXpYI2miUxED', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOWVKcFRMcUFPekowNWtEWWNNVGExTTg5a0lPMjZVM0JXd2ZEaU5EWSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728323),
('M2BVSDRLhTgFPgYdI3YQbNMoIAGQ9NWYcL44HRim', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWnQ1WjI5b2JOblNLaXdQc3RoRWtnWmdYVUs5OFFaYW96cTdkYlpJUiI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728318),
('nj1PHEDZlaI0e3DpzaAIdyYBeG2ZXm0sdK1Aib3K', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoidkp3MmtrSUdZTHBacXQxU1BuaXZpd2g0akhZV0xQS1NEbmM3RlVtSyI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728325),
('NKs2WmPlVxoNAnZcZMkGRwBGz5szVf9BphRPZl1R', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMVZMelFUNmpIbzdySXAxOXlQSzVWVHRoTHVTTExFSlRhMXRZT1FyVCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728320),
('Q3vtd938SGks10CasX4t2F31ypNhKkq6ekT0G6YZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiR2M4R2NKeXA0ZUV2dnlHZ001Z1YwSW9Hc21sdTdsdUtHYjlQVUc2QSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728333),
('Qsvpsr4IdbK358n9N847h55tFdSGlgqscPVJEp6p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiT1pUbENVemNGQVpMUXM0N21NR25oaTdSbG1SUmJBUUZPeXRnODVDcSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738789),
('rMogC54Lv6r8zjS6pSgEStAQ8gFKOSrCkoXZJsQ4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibmhFU1Z0QmY4WnlBRzIydmpOWVU5OUt6cllMQmZFbWlCbHBqeFZiZiI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787748483),
('sGpuKAQjQ3TZNkmRSAp8SiyTShvFdhOounBxpM9P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOVdQY1ZhR0R1Ylh5TW5QeUpLYXZ0ekdKemlMVkNpN201aFZzbEw3aCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728327),
('uqZhCd4BYY0pRkqqAgDLfs25bKe6wjyZD2mnYyyn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYXl3Sm5maFpyeFpsY2F0M2FRdTFIek9LZlpDMUZEZGtJajdiZ1M3ZyI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738788),
('VsSG0rElpMrJ8XeUIwSsiwgOuhXSaMnpcNpW9R24', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoia0hFWmZMMUt4Q25ETGcxN01YYlBSMzhRMEh0bzgxb2VrT2dVNjFrUyI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787748480),
('Y9Rkovk4G5PZHumnn73EMubHPe5kudbiZuHBnbSr', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiSUlVdk5CUTZNUXVoSTc3QmZORTFlZGtDT1h4THRlQzU4ZUtKajdreCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiYjQxNDE5ZWRiMDY5Mjc4MTkwZGY2NmU0N2ZiOGFmOWNiYjc4ZGFhOWRlZDgzYmE4ZGY0NzZlNjg4YWY1NDc0OCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787728732),
('YesszFyqlPvvMZHZe5XbXHjuZClDRmXZLLgOyEEp', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IkliR3FyWVhvcHpnU0FCMDFPOEd6RzZmUldwWXRjRTZESjRycHMzSjAiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjY0OiJiNDE0MTllZGIwNjkyNzgxOTBkZjY2ZTQ3ZmI4YWY5Y2JiNzhkYWE5ZGVkODNiYThkZjQ3NmU2ODhhZjU0NzQ4IjtzOjI1OiJsYW5ndWFnZV9pZF9mcm9tX2Ryb3Bkb3duIjtpOjE7czoyNzoibGFuZ3VhZ2VfbmFtZV9mcm9tX2Ryb3Bkb3duIjtzOjc6IkVuZ2xpc2giO3M6Mjc6Imxhbmd1YWdlX2NvZGVfZnJvbV9kcm9wZG93biI7czoyOiJlbiI7czozMjoibGFuZ3VhZ2VfZGlyZWN0aW9uX2Zyb21fZHJvcGRvd24iO2k6MDtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3NlcnZpY2UvZWNvbW1lcmNlIjtzOjU6InJvdXRlIjtzOjE3OiJzZXJ2aWNlLXBhZ2Uuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiJiNDE0MTllZGIwNjkyNzgxOTBkZjY2ZTQ3ZmI4YWY5Y2JiNzhkYWE5ZGVkODNiYThkZjQ3NmU2ODhhZjU0NzQ4Ijt9', 1787739096),
('YPx4SCAmegeXcVsSUGxL6uSqPUTvRtvnJUjW80Ge', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiamRjc0hDdlVCeXkzMGRPakN3YVFKZGJBb3R3UDJjdUFwWkFFWHpuRCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738792),
('YWucZ7Eyy1FqZCehJ07LmtrOQn1mZiVPdpc0P1RE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQkpJU2hMdjhlbnFFOFd5VHJKSzBlMjN3dVVnNzdlTWh5SlNKOHllMCI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo4OiJob21lcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787738793),
('zUyPA2smXapZEhpl5qk6eWvxyLToa73Z9jlLv8g0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/3.16.17 Chrome/144.0.7559.236 Electron/40.10.3 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRTdwbVhwS1lTcmt4V0dPVjB0S3JGQm1QOFR5Qm9obVRaZWtLTXZOOSI7czoyNToibGFuZ3VhZ2VfaWRfZnJvbV9kcm9wZG93biI7aToxO3M6Mjc6Imxhbmd1YWdlX25hbWVfZnJvbV9kcm9wZG93biI7czo3OiJFbmdsaXNoIjtzOjI3OiJsYW5ndWFnZV9jb2RlX2Zyb21fZHJvcGRvd24iO3M6MjoiZW4iO3M6MzI6Imxhbmd1YWdlX2RpcmVjdGlvbl9mcm9tX2Ryb3Bkb3duIjtpOjA7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qc29uL3ZlcnNpb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787748482);

-- --------------------------------------------------------

--
-- Table structure for table `site_images`
--

CREATE TABLE `site_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon_image` text DEFAULT NULL,
  `admin_logo_image` text DEFAULT NULL,
  `admin_small_logo_image` text DEFAULT NULL,
  `site_white_logo_image` text DEFAULT NULL,
  `site_colored_logo_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_images`
--

INSERT INTO `site_images` (`id`, `favicon_image`, `admin_logo_image`, `admin_small_logo_image`, `site_white_logo_image`, `site_colored_logo_image`, `created_at`, `updated_at`) VALUES
(1, '1710435935-Favicon-128X128.png', '1711510524-LOGO-328X96.png', '1711513849-Netigian-IT (12X96).png', '1710420591-netigian-logo-173X80.png', '1710420591-netigian-logo-173X80.png', '2024-02-07 17:24:46', '2024-03-27 04:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `site_infos`
--

CREATE TABLE `site_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `short_desc` text DEFAULT NULL,
  `copyright` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address_map_link` text DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_infos`
--

INSERT INTO `site_infos` (`id`, `language_id`, `short_desc`, `copyright`, `address`, `address_map_link`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'We value the user experience prior to offering our service. This moment presents to collaborate with us and elevate your brand to new heights.', '© 2024 Netigian IT, All Rights Reserved.', 'H-83, R-13, Sonadanga R/A, Khulna, Bangladesh', 'https://maps.app.goo.gl/PNtNnKz3pvfZa2Y37', 'contact@netigianit.com', '+88 01770 345518', '2024-02-13 10:16:04', '2024-11-02 10:51:17'),
(2, 4, 'আমাদের পরিষেবা অফার করার আগে ব্যবহারকারীর অভিজ্ঞতাকে মূল্য দিই। এই মুহূর্তটি সহযোগিতা করার এবং ব্র্যান্ডকে উচ্চতায় উন্নীত করার জন্য উপস্থাপন করে।', '©২০২৪ নেটিজিয়ান আইটি, সর্বস্বত্ব সংরক্ষিত.', 'খুলনা, বাংলাদেশ', 'https://maps.app.goo.gl/PNtNnKz3pvfZa2Y37', 'contact@netigianit.com', '০১৭৭০৩৪৫৫১৮', '2024-11-02 10:45:36', '2024-11-02 10:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `desc` text DEFAULT NULL,
  `skill_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `language_id`, `section_title`, `title`, `desc`, `skill_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Why Choose Us', 'We specialize in UI frameworks for years', 'A front end library is being released every day and it is requested to master these technologies.I also follow the market every day and follow the updates of new frontend frameworks and programming frameworks. It is easier for me to keep up with new technologies in projects', 'software-skill.png', '2024-02-08 17:46:34', '2026-08-17 13:48:12'),
(2, 4, 'আমাদের দক্ষতা', 'আমরা বছরের পর বছর ধরে UI ফ্রেমওয়ার্কগুলিতে বিশেষজ্ঞ', 'একটি ফ্রন্ট এন্ড লাইব্রেরি প্রতিদিন প্রকাশিত হচ্ছে এবং এই প্রযুক্তিগুলি আয়ত্ত করার জন্য অনুরোধ করা হচ্ছে। আমি প্রতিদিন বাজার অনুসরণ করি এবং নতুন ফ্রন্টএন্ড ফ্রেমওয়ার্ক এবং প্রোগ্রামিং ফ্রেমওয়ার্কের আপডেটগুলি অনুসরণ করি। প্রকল্পগুলিতে নতুন প্রযুক্তির সাথে তাল মিলিয়ে চলা আমার পক্ষে সহজ', 'software-skill.png', '2024-11-02 14:06:40', '2026-08-17 13:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `skill_info_lists`
--

CREATE TABLE `skill_info_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `percent_rate` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_info_lists`
--

INSERT INTO `skill_info_lists` (`id`, `language_id`, `title`, `percent_rate`, `order`, `created_at`, `updated_at`) VALUES
(2, 1, 'Coding', 97, 1, '2024-02-08 17:47:57', '2024-02-08 17:47:57'),
(3, 1, 'Digital Marketing', 95, 2, '2024-02-08 17:48:46', '2024-02-08 17:48:46'),
(4, 4, 'ওয়েব ডিজাইন', 95, 0, '2024-11-02 14:07:14', '2024-11-02 14:07:14'),
(5, 4, 'ওয়েব ডেভেলপমেন্ট', 90, 0, '2024-11-02 14:07:36', '2024-11-02 14:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `language_id`, `slider_image`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '1709021674-1706785494-banner-1.jpg', 0, '2024-02-13 17:23:39', '2024-02-27 08:14:34'),
(2, 1, '1709021583-1706785494-banner-2.jpg', 1, '2024-02-13 17:23:51', '2024-02-27 08:13:03'),
(3, 1, '1709021555-1706785494-video.jpg', 2, '2024-02-13 17:23:59', '2024-02-27 08:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_media` varchar(191) NOT NULL,
  `link` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `social_media`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-facebook-f', 'https://www.facebook.com/netigianit', 1, '2024-02-08 18:20:48', '2024-02-13 10:27:14'),
(2, 'fab fa-youtube', 'https://www.youtube.com/@netigianit', 1, '2024-02-13 10:22:00', '2024-03-25 02:42:46'),
(3, 'fab fa-linkedin-in', 'https://www.linkedin.com/company/netigianit', 1, '2024-02-13 10:24:32', '2024-03-10 21:16:08'),
(4, 'fab fa-instagram', 'https://www.instagram.com/netigianit', 1, '2024-02-13 10:28:01', '2024-02-13 10:28:01'),
(5, 'fab fa-whatsapp', 'https://wa.me/01770345518', 1, '2024-07-09 09:46:07', '2024-07-09 09:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'upshakilislam@gmail.com', '2024-02-13 17:50:00', '2024-02-13 17:50:00'),
(2, 'shakljoka103@gmail.com', '2024-02-13 17:50:10', '2024-02-13 17:50:10'),
(3, 'freelancersuvo2022@gmail.com', '2024-02-13 17:50:25', '2024-02-13 17:50:25'),
(4, 'netigianacademy@gmail.com', '2024-02-13 17:50:38', '2024-02-13 17:50:38'),
(5, 'calibwolfe@yahoo.com', '2024-09-24 11:33:18', '2024-09-24 11:33:18'),
(6, 'franklinlorinhz944@gmail.com', '2024-10-01 22:56:13', '2024-10-01 22:56:13'),
(7, 'ferlisbo2000@gmail.com', '2024-10-07 01:44:27', '2024-10-07 01:44:27'),
(8, 'butlersty45@gmail.com', '2024-10-07 08:21:28', '2024-10-07 08:21:28'),
(9, 'timoteasolomone5728@gmail.com', '2024-10-13 16:54:21', '2024-10-13 16:54:21'),
(10, 'brodbasswe4183@gmail.com', '2024-10-19 04:48:43', '2024-10-19 04:48:43'),
(11, 'wdaglasb@gmail.com', '2024-10-19 08:18:49', '2024-10-19 08:18:49'),
(12, 'hdjenz2002@gmail.com', '2024-10-23 12:23:15', '2024-10-23 12:23:15'),
(13, 'pysivelazb@gmail.com', '2024-10-27 00:15:18', '2024-10-27 00:15:18'),
(14, 'jlpitsvljbyeu@yahoo.com', '2024-10-31 01:58:47', '2024-10-31 01:58:47'),
(15, 'redirect-192fc634cb5c52aea74a780afc821b2a@webmark.eting.org', '2024-11-02 20:05:36', '2024-11-02 20:05:36'),
(16, 'henrifryga@gmail.com', '2024-11-06 13:45:37', '2024-11-06 13:45:37'),
(17, 'mxbkctsfjct@yahoo.com', '2024-11-06 18:19:55', '2024-11-06 18:19:55'),
(18, 'maylorindab7934@gmail.com', '2024-11-08 06:28:23', '2024-11-08 06:28:23'),
(19, 'cwxnbsfvoktyman@yahoo.com', '2024-11-08 07:19:10', '2024-11-08 07:19:10'),
(20, 'nzdboml7dwwo@yahoo.com', '2024-11-09 05:03:57', '2024-11-09 05:03:57'),
(21, 'datkinsonin462@gmail.com', '2024-11-09 05:50:35', '2024-11-09 05:50:35'),
(22, 'haqjlxfedlhnfc@yahoo.com', '2024-11-09 22:47:29', '2024-11-09 22:47:29'),
(23, 'poulurhys@yahoo.com', '2024-11-09 23:46:54', '2024-11-09 23:46:54'),
(24, 'silvanabmo2003@gmail.com', '2024-11-10 15:58:21', '2024-11-10 15:58:21'),
(25, 'paola.bucciarelli@yahoo.com', '2024-11-10 17:05:53', '2024-11-10 17:05:53'),
(26, 'gvxjaxibjhc@yahoo.com', '2024-11-11 09:58:32', '2024-11-11 09:58:32'),
(27, 'zdeonnyu29@gmail.com', '2024-11-11 10:40:51', '2024-11-11 10:40:51'),
(28, 'graveshollisr6021@gmail.com', '2024-11-12 04:20:29', '2024-11-12 04:20:29'),
(29, 'raashtgbpgce@yahoo.com', '2024-11-12 05:22:10', '2024-11-12 05:22:10'),
(30, 'mrobertsono621@gmail.com', '2024-11-13 03:25:16', '2024-11-13 03:25:16'),
(31, 'anoblei1986@gmail.com', '2024-11-13 04:41:08', '2024-11-13 04:41:08'),
(32, 'reddhuffmank2651@gmail.com', '2024-11-14 00:49:33', '2024-11-14 00:49:33'),
(33, 'qetutara47@gmail.com', '2025-11-24 08:54:23', '2025-11-24 08:54:23'),
(34, 'ikenedama24@gmail.com', '2025-11-30 12:40:23', '2025-11-30 12:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `team_image` text DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `job` text DEFAULT NULL,
  `link_2` text DEFAULT NULL,
  `link_3` text DEFAULT NULL,
  `link_4` text DEFAULT NULL,
  `link_5` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `language_id`, `team_image`, `name`, `job`, `link_2`, `link_3`, `link_4`, `link_5`, `order`, `created_at`, `updated_at`) VALUES
(2, 1, 'demo-team-04.png', 'Prodip Kumar Das', 'Web Developer (Laravel)', 'https://web.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 3, '2024-02-08 12:51:16', '2024-11-02 18:12:31'),
(3, 1, 'demo-team-02.png', 'Md Sabuj Sardar', 'Digital Marketer', 'https://web.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 2, '2024-02-08 17:54:53', '2024-10-26 08:05:04'),
(4, 1, 'demo-team-01.png', 'Md Shakil Islam', 'CEO & Founder', 'https://web.facebook.com/shakilislamsuvobd1', 'https://x.com/MdShakilislamBD', 'https://www.instagram.com/shakil.islam.suvo', 'https://www.linkedin.com/in/mdshakilislamsuvo', 1, '2024-02-08 18:02:41', '2024-10-26 06:28:26'),
(6, 1, 'demo-team-06.png', 'Al Mamun', 'Web Developer (React JS)', 'https://web.facebook.com/netigianit', 'https://x.com/netigianit/', 'https://www.instagram.com/netigianit/', 'https://www.linkedin.com/company/netigianit', 5, '2024-03-06 07:35:31', '2024-11-02 18:12:12'),
(8, 1, 'demo-team-05.png', 'Alamin Shikder', 'Customer Support', 'https://web.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit/', 'https://www.linkedin.com/company/netigianit', 4, '2024-03-22 07:59:33', '2025-11-02 16:29:26'),
(9, 1, 'demo-team-03.png', 'Tanvir Ahmed Jony', 'Vue.js Expert', 'https://web.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit/', 'https://www.linkedin.com/company/netigianit', 2, '2024-03-22 08:27:30', '2026-08-18 08:03:25'),
(11, 1, 'demo-team-01.png', 'Uzzol Badsha', 'React Developer', 'https://web.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 7, '2024-05-29 04:15:12', '2025-11-02 16:29:05'),
(12, 1, 'demo-team-02.png', 'Sajal Ray', 'Web Developer (Laravel)', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 8, '2024-05-29 07:05:13', '2025-11-02 16:30:20'),
(13, 1, 'demo-team-03.png', 'Nazmul Hossain', 'Web Developer (Vue JS)', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 9, '2024-06-11 07:45:19', '2024-11-02 18:11:34'),
(15, 4, 'demo-team-01.png', 'মোঃ শাকিল ইসলাম', 'সিইও & ফাউন্ডার', 'https://web.facebook.com/shakilislamsuvobd1', 'https://x.com/MdShakilislamBD', 'https://www.instagram.com/shakil.islam.suvo', 'https://www.linkedin.com/in/mdshakilislamsuvo', 0, '2024-11-02 17:45:17', '2024-11-02 17:45:17'),
(16, 4, 'demo-team-02.png', 'মোঃ সবুজ সরদার', 'ডিজিটাল মার্কেটার', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 17:46:44', '2024-11-03 06:10:26'),
(17, 4, 'demo-team-03.png', 'তানভির রহমান', 'এসইও এক্সপার্ট', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 17:51:11', '2024-11-03 06:10:01'),
(18, 4, 'demo-team-04.png', 'প্রদীপ কুমার দাশ', 'ওয়েব ডেভেলপার (লারাভেল)', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 17:55:38', '2024-11-03 06:09:18'),
(19, 4, 'demo-team-05.png', 'আলামিন শিকদার', 'গ্রাফিক্স ডিজাইনার', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 17:57:02', '2024-11-03 06:08:51'),
(20, 4, 'demo-team-06.png', 'আল মামুন', 'ওয়েব ডেভেলপার (রিয়াক্ট)', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 17:58:21', '2024-11-03 06:07:32'),
(21, 4, 'demo-team-01.png', 'ঊজ্জল বাদশা', 'ভিডিও এডিটর', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 17:59:32', '2024-11-03 06:07:05'),
(22, 4, 'demo-team-02.png', 'সজল রয়', 'ওয়েব ডেভেলপার (ফুলস্ট্যাক)', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 18:10:14', '2024-11-03 06:06:26'),
(23, 4, 'demo-team-03.png', 'নাজমুল হোসাইন', 'ওয়েব ডেভেলপার (ভিউ জেএস)', 'https://www.facebook.com/netigianit', 'https://x.com/netigianit', 'https://www.instagram.com/netigianit', 'https://www.linkedin.com/company/netigianit', 0, '2024-11-02 18:11:04', '2024-11-03 06:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `team_sections`
--

CREATE TABLE `team_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_sections`
--

INSERT INTO `team_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Our Team', 'Team Member', '2024-02-08 12:50:52', '2026-08-18 08:01:56'),
(2, 4, 'টিম', 'আমাদের টিম', '2024-11-02 17:42:16', '2024-11-02 17:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `image_status` int(11) NOT NULL DEFAULT 1,
  `testimonial_image` text DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `job` varchar(191) NOT NULL,
  `desc` text NOT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `language_id`, `image_status`, `testimonial_image`, `name`, `job`, `desc`, `star`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'demo-client-05.png', 'Amlatif delpis', 'Australian Client', 'Netigian IT provided exceptional service, delivering on time and within budget. Their team\'s expertise in digital solutions surpassed our expectations. Highly recommend for any business seeking reliable and innovative IT services.', 5, 1, '2024-02-08 18:04:29', '2024-03-23 12:06:23'),
(2, 1, 1, 'demo-client-06.png', 'Jolenus Selks', 'USA Client', 'Their creative team understood our vision perfectly and produced stunning designs with prompt turnaround times. Highly recommend their services for any digital design needs.', 5, 3, '2024-02-08 18:05:49', '2024-03-23 12:09:46'),
(3, 1, 1, 'demo-client-01.png', 'Tamzid Rahman', 'CEO of BD Krishi, Bangladesh', 'Working with this team has been a game-changer for our business. They delivered a shocking, functional website that surpassed our expectations. Highly recommended!', 5, 0, '2024-05-21 09:41:49', '2024-11-02 16:13:49'),
(4, 1, 1, 'demo-client-02.png', 'Isadora Moonbeam', 'Houston, USA Client', 'The digital marketing services supplied by this team have been outstanding. Our online presence has overgrown completely, highest to increased traffic and sales. Highly recommend their expertise!', 5, 0, '2024-05-21 10:18:33', '2024-05-26 04:03:36'),
(5, 1, 1, 'demo-client-03.png', 'Percival Gaines', 'USA Client', 'Netigian IT\'s graphic design services are top-notch. They delivered creative and high-quality designs that perfectly captured our brand. We highly recommend their professional and proficient team.', 5, 0, '2024-05-22 12:06:09', '2024-05-22 12:06:09'),
(6, 1, 1, 'demo-client-04.png', 'Elowen Sinclair', 'USA Client', 'Netigian IT did an amazing job with our video editing project. Their creativity and attention to detail were outstanding, resulting in a polished and professional final product.', 5, 0, '2024-05-22 12:23:50', '2024-05-22 12:23:50'),
(7, 4, 1, 'demo-client-01.png', 'তামজিদ রহমান', 'সিইও, বিডি কৃষি, বাংলাদেশ', 'এই টিমের সাথে কাজ করা আমাদের ব্যবসার জন্য একটি গেম-চেঞ্জার হয়েছে। তারা একটি চমকপ্রদ, কার্যকরী ওয়েবসাইট সরবরাহ করেছে যা আমাদের প্রত্যাশা ছাড়িয়ে গেছে। অত্যন্ত প্রস্তাবিত!', 5, 0, '2024-11-02 15:44:30', '2024-11-02 16:16:52'),
(8, 4, 1, 'demo-client-02.png', 'ইশাডোরা মুনবিম', 'হউস্টোন, ইউএসএ ক্লায়েন্ট', 'এই দল দ্বারা সরবরাহ করা ডিজিটাল বিপণন পরিষেবাগুলি অসামান্য হয়েছে। আমাদের অনলাইন উপস্থিতি সম্পূর্ণভাবে বৃদ্ধি পেয়েছে, ট্রাফিক এবং বিক্রয় বৃদ্ধির জন্য সর্বোচ্চ। অত্যন্ত তাদের দক্ষতা সুপারিশ!', 5, 0, '2024-11-02 15:46:19', '2024-11-02 15:46:19'),
(9, 4, 1, 'demo-client-03.png', 'পার্সিভাল গেইনস', 'ইউএসএ ক্লায়েন্ট', 'নেটিজিয়ান আইটির গ্রাফিক ডিজাইন পরিষেবাগুলি শীর্ষস্থানীয়। তারা সৃজনশীল এবং উচ্চ-মানের ডিজাইন সরবরাহ করেছে যা আমাদের ব্র্যান্ডকে পুরোপুরি ক্যাপচার করেছে। আমরা অত্যন্ত তাদের পেশাদার এবং দক্ষ দল সুপারিশ.', 5, 0, '2024-11-02 15:48:15', '2024-11-02 15:48:24'),
(10, 4, 1, 'demo-client-04.png', 'এলোভেন সিনক্লেয়ার', 'ইউএসএ ক্লায়েন্ট', 'নেটিজিয়ান আইটি, আমাদের ভিডিও সম্পাদনা প্রকল্পের সাথে একটি আশ্চর্যজনক কাজ করেছে। তাদের সৃজনশীলতা এবং বিস্তারিত মনোযোগ অসামান্য ছিল, একটি পালিশ এবং পেশাদার চূড়ান্ত পণ্য ফলস্বরূপ.', 5, 0, '2024-11-02 15:49:29', '2024-11-02 15:49:29'),
(11, 4, 1, 'demo-client-05.png', 'আমলাটিফ ডেলপিস', 'অস্ট্রেলিয়ান ক্লায়েন্ট', 'নেটিজিয়ান আইটি, ব্যতিক্রমী পরিষেবা প্রদান করে, সময়মতো এবং বাজেটের মধ্যে সরবরাহ করে। ডিজিটাল সমাধানে তাদের দলের দক্ষতা আমাদের প্রত্যাশাকে ছাড়িয়ে গেছে। নির্ভরযোগ্য এবং উদ্ভাবনী আইটি পরিষেবা খুঁজছেন এমন কোনও ব্যবসার জন্য অত্যন্ত সুপারিশ করুন।', 5, 0, '2024-11-02 15:50:51', '2024-11-02 15:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_sections`
--

CREATE TABLE `testimonial_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_sections`
--

INSERT INTO `testimonial_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Testimonials', 'Our Testimonials', '2024-02-08 18:03:26', '2024-02-08 18:03:26'),
(2, 4, 'টেস্টিমোনিয়াল', 'ক্লায়েন্ট টেস্টিমোনিয়াল', '2024-11-02 15:42:56', '2024-11-02 15:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `type`, `created_at`, `updated_at`) VALUES
(9, 'Admin', 'admin@netigency.com', NULL, '$2y$10$TwW3UfMI/JEnjUjcz6FE9uIA0NZWG0MfsrpASf7e2mIzvP3JSOc8y', NULL, NULL, 'htXhvLeyrKiLQ56eUQ2xU8nctqk4PV9G7TYfomQIQldX6hk4r14Lrvozjjpc', NULL, '1786302415-photo_2025-12-31_16-47-05.jpg', 0, '2026-07-30 02:59:40', '2026-08-09 13:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_link` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_link`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=1yBQPVPdQF8', '2024-02-13 17:25:46', '2024-03-08 03:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `work_processes`
--

CREATE TABLE `work_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `image_status` enum('enable','disable') NOT NULL,
  `work_process_image` text DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_processes`
--

INSERT INTO `work_processes` (`id`, `language_id`, `image_status`, `work_process_image`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'enable', 'demo-process-01.png', 'Thinking', 0, '2024-02-08 17:42:54', '2024-10-10 13:30:52'),
(2, 1, 'enable', 'demo-process-02.png', 'Research', 1, '2024-02-08 17:43:20', '2024-10-10 13:22:23'),
(3, 1, 'enable', 'demo-process-03.png', 'Development', 2, '2024-02-08 17:44:05', '2024-10-10 13:26:18'),
(4, 4, 'enable', 'demo-process-01.png', 'থিংকিং', 0, '2024-11-02 14:04:33', '2024-11-02 14:04:33'),
(5, 4, 'enable', 'demo-process-02.png', 'রিসার্চ', 0, '2024-11-02 14:04:46', '2024-11-02 14:04:46'),
(6, 4, 'enable', 'demo-process-03.png', 'ডেভেলপমেন্ট', 0, '2024-11-02 14:05:08', '2024-11-02 14:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `work_process_sections`
--

CREATE TABLE `work_process_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `section_title` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_process_sections`
--

INSERT INTO `work_process_sections` (`id`, `language_id`, `section_title`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'How We Work', 'We build your projects in three stages', '2024-02-08 17:42:11', '2024-09-23 16:50:12'),
(2, 4, 'আমরা যেভাবে কাজ করি', 'আমরা আপনার প্রকল্পগুলি তিনটি পর্যায়ে তৈরি করি', '2024-11-02 14:03:47', '2024-11-02 14:03:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_language_id_foreign` (`language_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_language_id_foreign` (`language_id`);

--
-- Indexes for table `blog_background_images`
--
ALTER TABLE `blog_background_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_paginates`
--
ALTER TABLE `blog_paginates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_sections`
--
ALTER TABLE `blog_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `breadcrumbs`
--
ALTER TABLE `breadcrumbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`),
  ADD KEY `categories_language_id_foreign` (`language_id`);

--
-- Indexes for table `color_options`
--
ALTER TABLE `color_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_language_id_foreign` (`language_id`);

--
-- Indexes for table `contact_sections`
--
ALTER TABLE `contact_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counters_language_id_foreign` (`language_id`);

--
-- Indexes for table `counter_sections`
--
ALTER TABLE `counter_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_language_id_foreign` (`language_id`);

--
-- Indexes for table `feature_sections`
--
ALTER TABLE `feature_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `fixed_contents`
--
ALTER TABLE `fixed_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fixed_contents_language_id_foreign` (`language_id`);

--
-- Indexes for table `frontend_keywords`
--
ALTER TABLE `frontend_keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frontend_keywords_language_id_foreign` (`language_id`);

--
-- Indexes for table `google_analytics`
--
ALTER TABLE `google_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_versions`
--
ALTER TABLE `homepage_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_lists`
--
ALTER TABLE `info_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_lists_language_id_foreign` (`language_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_language_id_foreign` (`language_id`);

--
-- Indexes for table `panel_keywords`
--
ALTER TABLE `panel_keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panel_keywords_language_id_foreign` (`language_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_language_id_foreign` (`language_id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolio_categories_category_name_unique` (`category_name`),
  ADD KEY `portfolio_categories_language_id_foreign` (`language_id`);

--
-- Indexes for table `portfolio_details`
--
ALTER TABLE `portfolio_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_details_portfolio_id_foreign` (`portfolio_id`);

--
-- Indexes for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `portfolio_sliders`
--
ALTER TABLE `portfolio_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_sliders_portfolio_id_foreign` (`portfolio_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_language_id_foreign` (`language_id`);

--
-- Indexes for table `quick_access_buttons`
--
ALTER TABLE `quick_access_buttons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seos_language_id_foreign` (`language_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_language_id_foreign` (`language_id`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_details_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_paginates`
--
ALTER TABLE `service_paginates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_images`
--
ALTER TABLE `site_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_infos`
--
ALTER TABLE `site_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_infos_language_id_foreign` (`language_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_language_id_foreign` (`language_id`);

--
-- Indexes for table `skill_info_lists`
--
ALTER TABLE `skill_info_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_info_lists_language_id_foreign` (`language_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_language_id_foreign` (`language_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_language_id_foreign` (`language_id`);

--
-- Indexes for table `team_sections`
--
ALTER TABLE `team_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_language_id_foreign` (`language_id`);

--
-- Indexes for table `testimonial_sections`
--
ALTER TABLE `testimonial_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonial_sections_language_id_foreign` (`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_processes`
--
ALTER TABLE `work_processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_processes_language_id_foreign` (`language_id`);

--
-- Indexes for table `work_process_sections`
--
ALTER TABLE `work_process_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_process_sections_language_id_foreign` (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog_background_images`
--
ALTER TABLE `blog_background_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_paginates`
--
ALTER TABLE `blog_paginates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_sections`
--
ALTER TABLE `blog_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breadcrumbs`
--
ALTER TABLE `breadcrumbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `color_options`
--
ALTER TABLE `color_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_sections`
--
ALTER TABLE `contact_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counter_sections`
--
ALTER TABLE `counter_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `feature_sections`
--
ALTER TABLE `feature_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fixed_contents`
--
ALTER TABLE `fixed_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `frontend_keywords`
--
ALTER TABLE `frontend_keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `google_analytics`
--
ALTER TABLE `google_analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_versions`
--
ALTER TABLE `homepage_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info_lists`
--
ALTER TABLE `info_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=683;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `panel_keywords`
--
ALTER TABLE `panel_keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio_details`
--
ALTER TABLE `portfolio_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio_sliders`
--
ALTER TABLE `portfolio_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quick_access_buttons`
--
ALTER TABLE `quick_access_buttons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_paginates`
--
ALTER TABLE `service_paginates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_images`
--
ALTER TABLE `site_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_infos`
--
ALTER TABLE `site_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill_info_lists`
--
ALTER TABLE `skill_info_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `team_sections`
--
ALTER TABLE `team_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonial_sections`
--
ALTER TABLE `testimonial_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_processes`
--
ALTER TABLE `work_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_process_sections`
--
ALTER TABLE `work_process_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_sections`
--
ALTER TABLE `blog_sections`
  ADD CONSTRAINT `blog_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_sections`
--
ALTER TABLE `contact_sections`
  ADD CONSTRAINT `contact_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counters`
--
ALTER TABLE `counters`
  ADD CONSTRAINT `counters_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counter_sections`
--
ALTER TABLE `counter_sections`
  ADD CONSTRAINT `counter_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_sections`
--
ALTER TABLE `feature_sections`
  ADD CONSTRAINT `feature_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fixed_contents`
--
ALTER TABLE `fixed_contents`
  ADD CONSTRAINT `fixed_contents_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `frontend_keywords`
--
ALTER TABLE `frontend_keywords`
  ADD CONSTRAINT `frontend_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_lists`
--
ALTER TABLE `info_lists`
  ADD CONSTRAINT `info_lists_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `panel_keywords`
--
ALTER TABLE `panel_keywords`
  ADD CONSTRAINT `panel_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD CONSTRAINT `portfolio_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_details`
--
ALTER TABLE `portfolio_details`
  ADD CONSTRAINT `portfolio_details_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  ADD CONSTRAINT `portfolio_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_sliders`
--
ALTER TABLE `portfolio_sliders`
  ADD CONSTRAINT `portfolio_sliders_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seos`
--
ALTER TABLE `seos`
  ADD CONSTRAINT `seos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_details`
--
ALTER TABLE `service_details`
  ADD CONSTRAINT `service_details_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD CONSTRAINT `service_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `site_infos`
--
ALTER TABLE `site_infos`
  ADD CONSTRAINT `site_infos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skill_info_lists`
--
ALTER TABLE `skill_info_lists`
  ADD CONSTRAINT `skill_info_lists_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_sections`
--
ALTER TABLE `team_sections`
  ADD CONSTRAINT `team_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonial_sections`
--
ALTER TABLE `testimonial_sections`
  ADD CONSTRAINT `testimonial_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_processes`
--
ALTER TABLE `work_processes`
  ADD CONSTRAINT `work_processes_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_process_sections`
--
ALTER TABLE `work_process_sections`
  ADD CONSTRAINT `work_process_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
