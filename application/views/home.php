<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
       .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #6366F1, #A855F7);
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #FFF;
            color: #6366F1;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #ECEDFF;
            transform: translateY(-2px);
        }
        .feature-section {
            padding: 80px 0;
            text-align: center;
        }
        .feature-section h2 {
            font-size: 2.5rem;
            margin-bottom: 50px;
            color: #333;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        .feature-item {
            background-color: #FFF;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .feature-item i {
            font-size: 2.5rem;
            color: #6366F1;
            margin-bottom: 20px;
        }
        .feature-item h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }
        .feature-item p {
            font-size: 1rem;
            color: #666;
        }
        .testimonial-section {
            background-color: #ECEDFF;
            padding: 80px 0;
        }
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .testimonial-item {
            background-color: #FFF;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .testimonial-item img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .testimonial-item p {
            font-style: italic;
            margin-bottom: 15px;
        }
        .testimonial-item h4 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .testimonial-item span {
            color: #666;
            font-size: 0.9rem;
        }
        .cta-section {
            background: linear-gradient(135deg, #A855F7, #6366F1);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .cta-section p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 30px;
        }
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Transform Your Business with ShopEase</h1>
        <p>The all-in-one ecommerce platform that empowers you to sell more, manage effortlessly, and grow faster.</p>
        <a href="#" class="btn">Start Free Trial</a>
    </div>
</section>

<!-- Feature Section -->
<section class="feature-section">
    <div class="container">
        <h2>Powerful Features to Boost Your Business</h2>
        <div class="feature-grid">
            <div class="feature-item">
                <i class="fas fa-box-open"></i>
                <h3>Smart Inventory Management</h3>
                <p>Track stock levels in real-time and automate reordering to never miss a sale.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-chart-line"></i>
                <h3>Advanced Analytics</h3>
                <p>Gain actionable insights with detailed reports on sales, customer behavior, and trends.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-mobile-alt"></i>
                <h3>Mobile-Optimized</h3>
                <p>Provide a seamless shopping experience across all devices with responsive design.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-users-cog"></i>
                <h3>Multi-User Access</h3>
                <p>Collaborate efficiently with role-based permissions for your team members.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="container">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-grid">
            <div class="testimonial-item">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sarah Johnson">
                <p>"ShopEase has revolutionized the way we manage our online store. The intuitive interface and powerful features have helped us increase sales by 40%!"</p>
                <h4>Sarah Johnson</h4>
                <span>CEO, Fashion Boutique</span>
            </div>
            <div class="testimonial-item">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen">
                <p>"The analytics tools provided by ShopEase have given us invaluable insights into our customers' behavior, allowing us to optimize our product offerings and marketing strategies."</p>
                <h4>Michael Chen</h4>
                <span>Marketing Director, Tech Gadgets Inc.</span>
            </div>
            <div class="testimonial-item">
                <img src="https://randomuser.me/api/portraits/women/89.jpg" alt="Emma Rodriguez">
                <p>"As a small business owner, I appreciate how ShopEase scales with my needs. It's been an essential part of our growth from a local shop to a nationwide brand."</p>
                <h4>Emma Rodriguez</h4>
                <span>Founder, Artisanal Goods Co.</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Elevate Your Ecommerce Game?</h2>
        <p>Join thousands of successful businesses using ShopEase to grow their online presence and boost sales.</p>
        <a href="#" class="btn">Get Started Now</a>
    </div>
</section>

<?php $this->load->view('../components/footer'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>