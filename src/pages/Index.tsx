
import React, { useState, useEffect } from 'react';
import DurhamLogo from '@/components/DurhamLogo';
import NavButton from '@/components/NavButton';
import LoadingScreen from '@/components/LoadingScreen';
import { 
  Youtube, 
  ArrowRight, 
  CircleArrowRight, 
  CircleArrowUp,
  CircleArrowDown,
  CircleArrowLeft,
  Folder,
  FolderOpen,
  Image
} from 'lucide-react';

const Index = () => {
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // Simulating loading time
    const timer = setTimeout(() => {
      setLoading(false);
    }, 2000);
    
    return () => clearTimeout(timer);
  }, []);

  if (loading) {
    return <LoadingScreen />;
  }

  return (
    <div className="h-screen w-full bg-brand-white flex flex-col items-center justify-between py-4">
      {/* Background Elements */}
      <div className="fixed inset-0 z-0">
        <div className="absolute top-20 left-20 w-60 h-60 bg-brand-lightGreen/10 rounded-full blur-3xl"></div>
        <div className="absolute bottom-20 right-20 w-60 h-60 bg-brand-yellow/10 rounded-full blur-3xl"></div>
        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-brand-darkPink/5 rounded-full blur-3xl"></div>
      </div>
      
      {/* Main Content */}
      <div className="relative z-10 w-full max-w-6xl mx-auto px-4 flex flex-col h-full">
        {/* Durham College Logo */}
        <div className="mt-2 flex justify-center">
          <DurhamLogo />
        </div>
        
        {/* Main Heading */}
        <h1 className="text-4xl lg:text-5xl font-bold text-brand-darkGreen text-center my-4">
          Infographic Progress
        </h1>
        
        {/* Navigation Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8 flex-grow">
          {/* Left Section */}
          <div className="flex flex-col space-y-3">
            <h2 className="text-xl lg:text-2xl font-bold text-[#721B43] mb-2 text-center">
              THREE ANIMATIONS (ASSIGNMENT 05)
            </h2>
            <NavButton 
              to="/dc-psa" 
              label="Durham College (PSA)" 
              icon={<CircleArrowRight className="text-[#721B43]" />} 
              className="left-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/best-buy" 
              label="Best Buy" 
              icon={<CircleArrowRight className="text-[#721B43]" />} 
              className="left-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/burger-king" 
              label="Burger King" 
              icon={<CircleArrowRight className="text-[#721B43]" />} 
              className="left-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
          </div>
          
          {/* Center Section */}
          <div className="flex flex-col space-y-3">
            <h2 className="text-xl lg:text-2xl font-bold text-[#721B43] mb-2 text-center">
              DIGITAL SIGNAGE PANE
            </h2>
            <NavButton 
              to="/comp" 
              label="COMP (Assignment 04)" 
              icon={<CircleArrowUp className="text-[#721B43]" />} 
              className="center-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/logo" 
              label="Logo Pane (Assignment 06)" 
              icon={<CircleArrowUp className="text-[#721B43]" />} 
              className="center-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/news" 
              label="News & Ticker Tape (Assignment 07)" 
              icon={<CircleArrowUp className="text-[#721B43]" />} 
              className="center-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/weather" 
              label="Weather Pane (Assignment 08)" 
              icon={<CircleArrowUp className="text-[#721B43]" />} 
              className="center-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
          </div>
          
          {/* Right Section */}
          <div className="flex flex-col space-y-3">
            <h2 className="text-xl lg:text-2xl font-bold text-[#721B43] mb-2 text-center">
              ADDITIONAL FEATURES
            </h2>
            <NavButton 
              to="/admin" 
              label="Admin Panel" 
              icon={<CircleArrowLeft className="text-[#721B43]" />} 
              className="right-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/motion-graphics" 
              label="Motion Graphics Pane" 
              icon={<Image className="text-[#721B43]" />} 
              className="right-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/youtube" 
              label="YouTube Pane" 
              icon={<Youtube className="text-[#721B43]" />} 
              className="right-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
            <NavButton 
              to="/final" 
              label="Final" 
              icon={<Folder className="text-[#721B43]" />} 
              className="right-section-button border-[#721B43]/20 hover:border-[#721B43]/50 text-[#721B43] hover:text-[#721B43]"
            />
          </div>
        </div>
        
        {/* Footer */}
        <div className="mt-auto mb-2 text-center text-sm text-brand-darkBrown/80 font-lato">
          <p className="font-medium">Author: Sidharth Kulangara Thodiyil 100918679</p>
          <p>Infographic Progress Project - Durham College</p>
        </div>
      </div>
    </div>
  );
};

export default Index;
