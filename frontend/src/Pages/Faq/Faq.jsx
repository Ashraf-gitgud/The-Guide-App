import React, { useState } from 'react';
import './Faq.css';

const Faq = () => {
  const [activeIndex, setActiveIndex] = useState(null);

  const toggleFAQ = (index) => {
    setActiveIndex(activeIndex === index ? null : index);
  };

  const faqs = [
    {
      question: "What are the must-visit cities in Northern Morocco?",
      answer: "The top cities to visit in Northern Morocco include Chefchaouen (the famous blue city), Tangier (gateway to Africa), Tetouan (UNESCO-listed medina), Asilah (artsy coastal town), and Larache (historic port city)."
    },
    {
      question: "Is Northern Morocco safe for tourists?",
      answer: "Yes, Northern Morocco is generally safe for tourists. However, as with any travel destination, it's advisable to take normal precautions, avoid poorly lit areas at night, and be aware of your surroundings."
    },
    {
      question: "What's the best time to visit Northern Morocco?",
      answer: "The ideal times are spring (April-May) and fall (September-October) when temperatures are pleasant. Summers can be hot, especially inland, while winters are mild but can be rainy along the coast."
    },
    {
      question: "Do I need to speak Arabic or French to visit?",
      answer: "While Arabic is the official language and French is widely spoken, many people in tourist areas speak some English. Learning basic Arabic or French phrases is appreciated but not essential."
    },
    {
      question: "What's special about Chefchaouen?",
      answer: "Chefchaouen is famous for its blue-painted buildings in the old town, nestled in the Rif Mountains. It offers stunning photography opportunities, relaxed atmosphere, and excellent hiking in the surrounding area."
    },
    {
      question: "How is the transportation system in Northern Morocco?",
      answer: "Northern Morocco has good transportation options including trains (connecting Tangier to other major cities), buses (CTM is a reliable company), and shared taxis (grand taxis). Renting a car is also an option for more flexibility."
    },
    {
      question: "What should I wear as a tourist in Northern Morocco?",
      answer: "Modest clothing is recommended, especially for women. In coastal areas, Western clothing is more accepted, but covering shoulders and knees is respectful when visiting religious sites or smaller towns."
    },
    {
      question: "Are credit cards widely accepted?",
      answer: "In larger cities and tourist areas, yes. However, it's good to carry some cash (Moroccan dirhams) especially when visiting smaller towns, markets, or rural areas."
    }
  ];

  return (
    <div className="faq-wrapper">
      <div className="faq-container">
        <h1>Frequently Asked Questions About Northern Morocco</h1>
        <p className="faq-subtitle">Your guide to exploring the beautiful northern region of Morocco</p>
        
        <div className="faq-list">
          {faqs.map((faq, index) => (
            <div 
              key={index} 
              className={`faq-item ${activeIndex === index ? 'active' : ''}`}
              onClick={() => toggleFAQ(index)}
            >
              <div className="faq-question">
                <span className="question-text">{faq.question}</span>
                <span className="faq-toggle">
                  {activeIndex === index ? (
                    <svg width="16" height="2" viewBox="0 0 16 2" fill="none">
                      <path d="M1 1H15" stroke="currentColor" strokeWidth="2" strokeLinecap="round"/>
                    </svg>
                  ) : (
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M8 1V15M1 8H15" stroke="currentColor" strokeWidth="2" strokeLinecap="round"/>
                    </svg>
                  )}
                </span>
              </div>
              <div className="faq-answer">
                <p>{faq.answer}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Faq;