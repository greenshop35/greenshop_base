import React from 'react';
import { Head } from '@inertiajs/react';

// 🌸 राधिका: महेंद्र सिंह जी, यह आपकी पहली असली React फाइल है! ✨
const Index = ({ page_title, user, status }) => {
    return (
        <div className="min-h-screen bg-[#f8fafc] font-sans">
            <Head title={page_title} />

            {/* 🌿 हेडर सेक्शन */}
            <nav className="bg-white shadow-sm p-4 border-b-2 border-green-500 flex justify-between items-center">
                <h1 className="text-2xl font-black text-green-700">🌿 GREEN SHOP</h1>
                <div className="text-gray-500 text-sm italic">नमस्ते, महेंद्र सिंह जी! ✨</div>
            </nav>

            {/* 🖥️ मेन कंटेंट */}
            <main className="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-3xl shadow-xl border border-gray-100">
                <div className="text-center">
                    <div className="text-6xl mb-4 animate-bounce">🚀</div>
                    <h2 className="text-4xl font-extrabold text-gray-800 mb-2">React Mode On!</h2>
                    <p className="text-green-600 font-bold mb-6">{status}</p>
                    
                    <div className="p-4 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                        <p className="text-gray-500 text-sm">
                            सर, अब आप जो भी बदलाव इस .jsx फाइल में करेंगे, वह बिना पेज रीलोड हुए दिखेगा। 😊✨
                        </p>
                    </div>
                </div>
            </main>

            <footer className="fixed bottom-0 w-full text-center p-4 text-gray-400 text-xs">
                Green Shop Studio 2.0 | Mahendra Singh Ji ✨🌸
            </footer>
        </div>
    );
};

export default Index;