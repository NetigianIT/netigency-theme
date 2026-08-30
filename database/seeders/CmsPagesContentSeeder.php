<?php

namespace Database\Seeders;

use App\Models\Admin\Page;
use App\Support\SiteCache;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class CmsPagesContentSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            'about-us-2' => [
                'page_title' => 'About Us',
                'order' => 0,
                'desc' => <<<'HTML'
<p class="ni-page-lead">Netigian IT is a digital product studio helping businesses design, build, and grow reliable software — from modern websites and ecommerce platforms to business systems that teams actually enjoy using.</p>
<p>We work with startups, growing companies, and established brands that need clear communication, clean delivery, and long-term technical partnership. Our team blends product thinking, UI/UX craft, and practical engineering so every release feels intentional and measurable.</p>
<div class="ni-page-stat-row">
<div class="ni-page-stat"><strong>8+</strong><span>Years building digital products</span></div>
<div class="ni-page-stat"><strong>120+</strong><span>Projects delivered</span></div>
<div class="ni-page-stat"><strong>40+</strong><span>Active clients worldwide</span></div>
</div>
<h2>What we do</h2>
<p>We partner with clients across discovery, design, development, launch, and ongoing improvement. Whether you need a conversion-focused website, a custom web application, or a full digital transformation roadmap, we stay close to outcomes — not just output.</p>
<div class="ni-page-grid">
<div class="ni-page-card"><h3>Product strategy</h3><p>We clarify goals, users, and priorities before writing a single line of code, so budgets go where they create value.</p></div>
<div class="ni-page-card"><h3>Design systems</h3><p>Interfaces that feel polished, accessible, and consistent across marketing pages and product flows.</p></div>
<div class="ni-page-card"><h3>Engineering</h3><p>Secure, maintainable builds with modern stacks, clean architecture, and documentation your team can own.</p></div>
<div class="ni-page-card"><h3>Growth support</h3><p>After launch we help with iterations, performance, analytics, and feature roadmaps that keep momentum.</p></div>
</div>
<h2>How we work</h2>
<ul>
<li>Discovery workshops to align scope, success metrics, and delivery milestones</li>
<li>Transparent sprint updates with demos, feedback loops, and clear next steps</li>
<li>Quality gates for design review, QA, accessibility, and security basics</li>
<li>Handover packs so your internal team or future partners can continue confidently</li>
</ul>
<h2>Why teams choose Netigian IT</h2>
<p>Clients stay with us because we communicate early, ship carefully, and treat every product like it will still matter two years from now. If you are planning a new platform, redesign, or digital upgrade, we would love to learn about your goals.</p>
HTML
            ],
            'our-vision-2' => [
                'page_title' => 'Our Vision',
                'order' => 1,
                'desc' => <<<'HTML'
<p class="ni-page-lead">Our vision is to help ambitious organizations move faster with software that is simple to use, strong under pressure, and designed around real people.</p>
<h2>Vision</h2>
<p>We believe technology should reduce friction — for customers buying online, teams managing operations, and leaders making decisions. Netigian IT aims to be the partner companies trust when digital quality directly affects growth and reputation.</p>
<h2>Mission</h2>
<p>To design and engineer digital products that create measurable business impact: better conversions, smoother operations, clearer insights, and experiences people remember for the right reasons.</p>
<div class="ni-page-grid">
<div class="ni-page-card"><h3>Clarity first</h3><p>We turn complex requirements into focused roadmaps everyone understands.</p></div>
<div class="ni-page-card"><h3>Craft matters</h3><p>Details in interface, performance, and copy are part of the product — not extras.</p></div>
<div class="ni-page-card"><h3>Own the outcome</h3><p>We measure success by business results, adoption, and long-term maintainability.</p></div>
<div class="ni-page-card"><h3>Grow together</h3><p>We build relationships that continue beyond launch through trusted support.</p></div>
</div>
<h2>Where we are headed</h2>
<ul>
<li>Deeper product partnerships with brands scaling across web and mobile</li>
<li>Stronger design systems that keep multi-team delivery consistent</li>
<li>Smarter automation and analytics baked into everyday business tools</li>
<li>More accessible digital experiences for every audience we serve</li>
</ul>
<p>If this direction matches what you are building next, let’s talk about how Netigian IT can help you get there with confidence.</p>
HTML
            ],
            'presentation' => [
                'page_title' => 'Presentation',
                'order' => 2,
                'desc' => <<<'HTML'
<p class="ni-page-lead">A quick company presentation of Netigian IT — who we are, what we deliver, and how we partner with product and marketing teams.</p>
<h2>Company snapshot</h2>
<p>Netigian IT is a full-service digital studio specializing in websites, ecommerce, web applications, UI/UX, and ongoing product improvement. We combine strategy, design, and engineering in one delivery team so you do not have to manage five vendors for one launch.</p>
<div class="ni-page-stat-row">
<div class="ni-page-stat"><strong>Strategy</strong><span>Discovery &amp; roadmap</span></div>
<div class="ni-page-stat"><strong>Design</strong><span>Brand, UX &amp; UI</span></div>
<div class="ni-page-stat"><strong>Build</strong><span>Web &amp; product engineering</span></div>
</div>
<h2>Capabilities overview</h2>
<div class="ni-page-grid">
<div class="ni-page-card"><h3>Corporate &amp; marketing sites</h3><p>Fast, SEO-ready websites that communicate your brand and convert visitors into leads.</p></div>
<div class="ni-page-card"><h3>Ecommerce experiences</h3><p>Storefronts with clean catalog UX, secure checkout, and operations-friendly admin workflows.</p></div>
<div class="ni-page-card"><h3>Custom web apps</h3><p>Dashboards, portals, and internal tools tailored to how your teams really work.</p></div>
<div class="ni-page-card"><h3>UI / UX design</h3><p>Research-backed interfaces, prototypes, and design systems ready for development.</p></div>
</div>
<h2>Engagement models</h2>
<ul>
<li><strong>Fixed-scope projects</strong> for clear launches with defined milestones</li>
<li><strong>Dedicated squads</strong> for continuous product development</li>
<li><strong>Design + build packages</strong> when you need one accountable team end to end</li>
<li><strong>Support retainers</strong> for maintenance, improvements, and growth experiments</li>
</ul>
<p>Want the full deck or a live walkthrough? Reach out and we will share a tailored presentation for your industry and goals.</p>
HTML
            ],
            'services' => [
                'page_title' => 'Recent Works Update',
                'order' => 3,
                'desc' => <<<'HTML'
<p class="ni-page-lead">A look at recent Netigian IT deliveries — product improvements, launches, and redesigns shipped for clients across ecommerce, healthcare, finance, and learning platforms.</p>
<h2>Latest highlights</h2>
<div class="ni-page-grid">
<div class="ni-page-card"><h3>Nova Commerce redesign</h3><p>Rebuilt product discovery and checkout flows, improving mobile conversion and reducing drop-off on high-traffic categories.</p></div>
<div class="ni-page-card"><h3>Pulse Finance dashboard</h3><p>Delivered a clearer money overview for account holders with faster load times and simplified navigation.</p></div>
<div class="ni-page-card"><h3>Verdant Care patient portal</h3><p>Designed calmer appointment and records journeys with accessibility improvements for older users.</p></div>
<div class="ni-page-card"><h3>Beacon LMS course hub</h3><p>Launched a learning experience with progress tracking, assessments, and admin reporting for training teams.</p></div>
</div>
<h2>What changed this quarter</h2>
<ul>
<li>Shipped 3 major UI redesigns and 2 ecommerce optimization sprints</li>
<li>Expanded our reusable component library for faster future builds</li>
<li>Improved Core Web Vitals on multiple client marketing sites</li>
<li>Added analytics dashboards so stakeholders can track launch impact</li>
</ul>
<h2>Coming next</h2>
<p>We are currently preparing new case studies in logistics tooling and appointment booking platforms. Explore our portfolio for live project details, or contact us if you want a similar outcome for your product.</p>
HTML
            ],
            'works' => [
                'page_title' => 'Checkout Case Study',
                'order' => 4,
                'desc' => <<<'HTML'
<p class="ni-page-lead">Selected case studies showing how Netigian IT approached problems, shipped solutions, and measured results with client teams.</p>
<h2>Case study 01 — Ecommerce checkout recovery</h2>
<p><strong>Challenge:</strong> A growing online retailer was losing customers between cart and payment, especially on mobile.</p>
<p><strong>Approach:</strong> We audited funnel analytics, simplified form fields, clarified shipping costs earlier, and redesigned trust signals around payment.</p>
<p><strong>Result:</strong> Noticeably higher completed checkouts within the first release cycle, with cleaner support tickets around order confirmation.</p>
<h2>Case study 02 — Operations dashboard rebuild</h2>
<p><strong>Challenge:</strong> An internal ops team was juggling spreadsheets and three separate tools to track daily work.</p>
<p><strong>Approach:</strong> We mapped workflows with staff, then built a unified web dashboard with role-based views, filters, and status tracking.</p>
<p><strong>Result:</strong> Faster handovers between shifts and fewer missed tasks, with leadership finally seeing live progress in one place.</p>
<div class="ni-page-grid">
<div class="ni-page-card"><h3>Discovery</h3><p>Stakeholder interviews, analytics review, and success metrics before design begins.</p></div>
<div class="ni-page-card"><h3>Prototype</h3><p>Clickable flows validated with real users and decision makers.</p></div>
<div class="ni-page-card"><h3>Build</h3><p>Iterative delivery with QA, performance checks, and staged rollout.</p></div>
<div class="ni-page-card"><h3>Measure</h3><p>Post-launch reporting so improvements stay tied to business goals.</p></div>
</div>
<h2>Want a case study for your industry?</h2>
<p>Tell us about your product, audience, and constraints. We will share relevant examples and a proposed approach for your next release.</p>
HTML
            ],
            'terms' => [
                'page_title' => 'Terms and Condition',
                'order' => 5,
                'desc' => <<<'HTML'
<p class="ni-page-lead">These Terms and Conditions explain how you may use the Netigian IT website and related digital services. By accessing our site, you agree to these terms.</p>
<h2>1. Acceptance of terms</h2>
<p>Using this website means you accept these Terms and Conditions and our Privacy Policy. If you do not agree, please stop using the site.</p>
<h2>2. Services information</h2>
<p>Content on this website describes our capabilities and past work for general information. Project scope, timelines, and fees are confirmed only through a written proposal or agreement between Netigian IT and the client.</p>
<h2>3. Intellectual property</h2>
<p>All branding, text, graphics, code samples, and other materials on this site belong to Netigian IT or our licensors unless stated otherwise. You may not copy, redistribute, or reuse materials without prior written permission.</p>
<h2>4. Client projects</h2>
<p>Deliverables created under a client contract are governed by that contract. Portfolio use of completed work may be referenced unless a confidentiality agreement restricts public display.</p>
<h2>5. Acceptable use</h2>
<p>You agree not to misuse the website, attempt unauthorized access, disrupt services, or use our content for unlawful purposes.</p>
<h2>6. Third-party links</h2>
<p>Our site may link to third-party websites. We are not responsible for their content, policies, or practices.</p>
<h2>7. Limitation of liability</h2>
<p>To the fullest extent permitted by law, Netigian IT is not liable for indirect or consequential losses arising from use of this website. Website content is provided without warranties of uninterrupted availability.</p>
<h2>8. Changes</h2>
<p>We may update these Terms and Conditions periodically. Continued use of the site after changes means you accept the revised terms.</p>
<h2>9. Contact</h2>
<p>Questions about these terms can be sent through the contact form on our website or your Netigian IT project manager.</p>
HTML
            ],
            'privacy-policy' => [
                'page_title' => 'Privacy Policy',
                'order' => 6,
                'desc' => <<<'HTML'
<p class="ni-page-lead">This Privacy Policy explains how Netigian IT collects, uses, and protects personal information when you visit our website or contact us.</p>
<h2>1. Information we collect</h2>
<ul>
<li>Contact details you submit through forms (name, email, phone, message)</li>
<li>Technical data such as browser type, device, and approximate location from analytics tools</li>
<li>Communication records when you email or message our team</li>
</ul>
<h2>2. How we use information</h2>
<ul>
<li>To respond to inquiries and prepare proposals</li>
<li>To improve website performance, content, and user experience</li>
<li>To send project updates or service information you requested</li>
<li>To maintain security and prevent abuse</li>
</ul>
<h2>3. Sharing of information</h2>
<p>We do not sell personal information. We may share limited data with trusted service providers (such as hosting, analytics, or email tools) who help us operate the website, under appropriate confidentiality expectations.</p>
<h2>4. Cookies and analytics</h2>
<p>We may use cookies or similar technologies to understand traffic and improve the site. You can control cookies through your browser settings.</p>
<h2>5. Data retention</h2>
<p>We keep personal information only as long as needed for the purposes above, legal requirements, or active client relationships.</p>
<h2>6. Your choices</h2>
<p>You may request access, correction, or deletion of personal information we hold about you, subject to applicable law. Contact us using the website contact form to make a request.</p>
<h2>7. Security</h2>
<p>We apply reasonable technical and organizational measures to protect information. No online transmission is completely secure, so please avoid sending highly sensitive data through public forms.</p>
<h2>8. Policy updates</h2>
<p>We may update this Privacy Policy from time to time. The latest version will always be available on this page.</p>
HTML
            ],
            'frequently-asked-questions' => [
                'page_title' => 'Frequently Asked Questions',
                'order' => 7,
                'desc' => <<<'HTML'
<p class="ni-page-lead">Answers to common questions about working with Netigian IT — timelines, process, pricing style, and what happens after launch.</p>
<div class="ni-faq-item"><h3>What services does Netigian IT provide?</h3><p>We design and build websites, ecommerce stores, custom web applications, UI/UX systems, and provide ongoing product support after launch.</p></div>
<div class="ni-faq-item"><h3>How does a typical project start?</h3><p>We begin with a discovery call, clarify goals and constraints, then share a proposed scope, timeline, and investment range before kickoff.</p></div>
<div class="ni-faq-item"><h3>How long does a website or web app take?</h3><p>Marketing sites often take a few weeks depending on content readiness. Custom apps and ecommerce builds vary by complexity — we confirm milestones in the proposal.</p></div>
<div class="ni-faq-item"><h3>Do you work with existing brands and design systems?</h3><p>Yes. We can extend your current brand guidelines or help evolve them into a practical digital design system for web and product screens.</p></div>
<div class="ni-faq-item"><h3>Can you improve an existing product instead of rebuilding?</h3><p>Absolutely. Many clients hire us for UX audits, performance work, feature sprints, and redesigns of critical flows like checkout or onboarding.</p></div>
<div class="ni-faq-item"><h3>How do payments usually work?</h3><p>Most projects use a kickoff payment plus milestone-based invoices. Retainer support is billed monthly. Exact terms appear in your agreement.</p></div>
<div class="ni-faq-item"><h3>Will we own the final deliverables?</h3><p>Yes — once invoices are settled according to contract, clients receive ownership of agreed project deliverables and source assets.</p></div>
<div class="ni-faq-item"><h3>Do you provide support after launch?</h3><p>We offer maintenance and growth retainers for updates, monitoring, small features, and technical guidance after go-live.</p></div>
<div class="ni-faq-item"><h3>Can remote teams collaborate with you easily?</h3><p>Yes. We work with distributed stakeholders using shared boards, weekly demos, and clear written updates so decisions stay fast.</p></div>
<div class="ni-faq-item"><h3>How do we get started?</h3><p>Send a short brief through our contact form or email. Share your goals, timeline, and any links to current products — we will respond with next steps.</p></div>
HTML
            ],
        ];

        foreach ($pages as $slug => $data) {
            $page = Page::query()
                ->where('language_id', 1)
                ->where('page_slug', $slug)
                ->first();

            if (! $page) {
                continue;
            }

            $page->update([
                'page_title' => $data['page_title'],
                'desc' => $data['desc'],
                'order' => $data['order'],
                'status' => 1,
            ]);
        }

        Cache::flush();
        SiteCache::flushContent();
        SiteCache::flushHomepage();
    }
}
