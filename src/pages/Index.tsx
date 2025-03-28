
import React from 'react';
import DurhamLogo from '@/components/DurhamLogo';
import NavButton from '@/components/NavButton';
import { 
  Youtube, 
  ArrowRight, 
  Image, 
  CircleArrowRight, 
  CircleArrowUp,
  CircleArrowDown,
  CircleArrowLeft,
  Folder,
  FolderOpen
} from 'lucide-react';

const Index = () => {
  return (
    <div className="min-h-screen w-full bg-brand-white flex flex-col items-center justify-center overflow-hidden">
      {/* Background Elements */}
      <div className="fixed inset-0 z-0">
        <div className="absolute top-20 left-20 w-60 h-60 bg-brand-lightGreen/10 rounded-full blur-3xl"></div>
        <div className="absolute bottom-20 right-20 w-60 h-60 bg-brand-yellow/10 rounded-full blur-3xl"></div>
        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-brand-darkPink/5 rounded-full blur-3xl"></div>
      </div>
      
      {/* Main Content */}
      <div className="relative z-10 w-full max-w-7xl mx-auto px-4">
        {/* Durham College Logo */}
        <div className="mb-6">
          <DurhamLogo />
        </div>
        
        {/* Main Heading */}
        <h1 className="text-4xl font-bold text-brand-darkGreen text-center mb-12">
          Infographic Progress
        </h1>
        
        {/* Navigation Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-16">
          {/* Left Section */}
          <div className="flex flex-col space-y-4">
            <h2 className="text-2xl font-bold text-brand-darkGreen mb-4">
              THREE ANIMATIONS (ASSIGNMENT 05)
            </h2>
            <NavButton 
              to="./dc-psa" 
              label="Durham College (PSA)" 
              icon={<CircleArrowRight className="text-brand-darkGreen" />} 
              className="left-section-button"
            />
            <NavButton 
              to="./best-buy" 
              label="Best Buy" 
              icon={<CircleArrowRight className="text-brand-darkGreen" />} 
              className="left-section-button"
            />
            <NavButton 
              to="./burger-king" 
              label="Burger King" 
              icon={<CircleArrowRight className="text-brand-darkGreen" />} 
              className="left-section-button"
            />
          </div>
          
          {/* Center Section */}
          <div className="flex flex-col space-y-4">
            <h2 className="text-2xl font-bold text-brand-darkBrown mb-4">
              DIGITAL SIGNAGE PANE
            </h2>
            <NavButton 
              to="./comp" 
              label="COMP (Assignment 04)" 
              icon={<CircleArrowUp className="text-brand-darkBrown" />} 
              className="center-section-button"
            />
            <NavButton 
              to="./logo" 
              label="Logo Pane (Assignment 06)" 
              icon={<CircleArrowUp className="text-brand-darkBrown" />} 
              className="center-section-button"
            />
            <NavButton 
              to="./news" 
              label="News & Ticker Tape (Assignment 07)" 
              icon={<CircleArrowUp className="text-brand-darkBrown" />} 
              className="center-section-button"
            />
            <NavButton 
              to="./weather" 
              label="Weather Pane (Assignment 08)" 
              icon={<CircleArrowUp className="text-brand-darkBrown" />} 
              className="center-section-button"
            />
          </div>
          
          {/* Right Section */}
          <div className="flex flex-col space-y-4">
            <NavButton 
              to="./admin" 
              label="Admin Panel" 
              icon={<CircleArrowLeft className="text-brand-darkPink" />} 
              className="admin-button"
            />
            <NavButton 
              to="./motion-graphics" 
              label="Motion Graphics Pane" 
              icon={<Image className="text-brand-red" />} 
              className="motion-button"
            />
            <NavButton 
              to="./youtube" 
              label="YouTube Pane" 
              icon={<Youtube className="text-brand-orange" />} 
              className="youtube-button"
            />
            <NavButton 
              to="./final" 
              label="Final" 
              icon={<Folder className="text-brand-yellow" />} 
              className="final-button"
            />
          </div>
        </div>
        
        {/* Footer */}
        <div className="mt-16 text-center text-sm text-brand-darkBrown/60 font-lato">
          <p>Infographic Progress Project - Durham College</p>
        </div>
      </div>
    </div>
  );
};

export default Index;
