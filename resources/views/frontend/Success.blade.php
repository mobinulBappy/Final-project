<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>অর্ডার সফল!</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0fff0; /* হালকা সবুজ ব্যাকগ্রাউন্ড */
            font-family: Arial, sans-serif;
            overflow: hidden; /* কনফেত্তি স্ক্রিনের বাইরে গেলে হাইড করার জন্য */
        }
        .success-message {
            text-align: center;
            z-index: 10; /* কনফেত্তির উপরে দেখানোর জন্য */
            background: white;
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #28a745; /* সবুজ রঙ */
            font-size: 3em;
            margin-bottom: 10px;
        }
        p {
            color: #333;
            font-size: 1.2em;
        }

        /* কনফেত্তির জন্য CSS - একটি সহজ CSS অ্যানিমেশন */
        .confetti-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 5;
        }
        .confetti {
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: var(--color);
            opacity: 0.8;
            animation: fall 5s linear infinite;
        }
        /* বিভিন্ন রঙের জন্য ভ্যারিয়েবল */
        .c1 { --color: #ffc107; left: 10%; animation-duration: 4s; animation-delay: 0s; }
        .c2 { --color: #dc3545; left: 20%; animation-duration: 5s; animation-delay: 0.5s; }
        .c3 { --color: #007bff; left: 30%; animation-duration: 3s; animation-delay: 1s; }
        .c4 { --color: #28a745; left: 40%; animation-duration: 6s; animation-delay: 1.5s; }
        .c5 { --color: #6f42c1; left: 50%; animation-duration: 4.5s; animation-delay: 2s; }
        /* আরও কনফেত্তি যোগ করা যায় */
        .c6 { --color: #fd7e14; left: 60%; animation-duration: 3.8s; animation-delay: 2.5s; }
        .c7 { --color: #20c997; left: 70%; animation-duration: 5.2s; animation-delay: 3s; }
        .c8 { --color: #e83e8c; left: 80%; animation-duration: 4.1s; animation-delay: 3.5s; }
        .c9 { --color: #007bff; left: 90%; animation-duration: 3.5s; animation-delay: 4s; }

        @keyframes fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0.2;
            }
        }
    </style>
</head>
<body>

    <div class="confetti-container">
        <div class="confetti c1"></div>
        <div class="confetti c2"></div>
        <div class="confetti c3"></div>
        <div class="confetti c4"></div>
        <div class="confetti c5"></div>
        <div class="confetti c6"></div>
        <div class="confetti c7"></div>
        <div class="confetti c8"></div>
        <div class="confetti c9"></div>
    </div>

    <div class="success-message">
        <h1>🎉 অভিনন্দন! 🎉</h1>
        <h2>আপনার অর্ডারটি সফল হয়েছে!</h2>
        <p>অর্ডার নম্বর: #{{ $order->phone }}</p>
        <p>খুব শীঘ্রই আপনার অর্ডারটি পাঠানো হবে।</p>
        <a href="{{ route('home') }}">হোম পেজে ফিরে যান</a>
    </div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <script>
        // পেজ লোড হওয়ার সাথে সাথেই কনফেত্তি চালানো
        confetti({
            particleCount: 100, // কনফেত্তির সংখ্যা
            spread: 70, // ছড়ানোর সীমা
            origin: { y: 0.6 }, // মাঝামাঝি থেকে ছড়ানো শুরু করবে
            startVelocity: 30,
            duration: 5000 // ৫ সেকেন্ড ধরে চলবে
        });

        // অন্য একটি বিস্ফোরণ অল্প সময়ের পরে
        setTimeout(() => {
            confetti({
                particleCount: 50,
                spread: 100,
                origin: { x: 0.5, y: 0.5 },
                startVelocity: 50,
                scalar: 0.9,
            });
        }, 1000);
    </script>
  @endpush  

</body>
</html>