
import React from 'react';

const DurhamLogo = () => {
  return (
    <div className="flex flex-col items-center relative">
      <div className="relative z-10 group">
        <div className="absolute -inset-1 bg-gradient-to-r from-brand-darkGreen/20 via-brand-lightGreen/20 to-brand-darkGreen/20 rounded-lg blur-md opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
        <div className="absolute inset-0 bg-white/30 backdrop-blur-sm rounded-lg"></div>
        <img 
          src="/lovable-uploads/db7cd2eb-44a5-4275-b03c-4afbd3ae22b1.png" 
          alt="Durham College Logo" 
          className="h-28 relative z-10 transition-all duration-300 group-hover:brightness-110"
        />
      </div>
      
      {/* Futuristic elements */}
      <div className="absolute -bottom-2 w-full overflow-hidden">
        <div className="h-0.5 w-full bg-gradient-to-r from-transparent via-brand-darkGreen to-transparent"></div>
        <div className="h-0.5 w-0 bg-gradient-to-r from-brand-lightGreen via-brand-darkGreen to-brand-lightGreen group-hover:w-full transition-all duration-700 ease-in-out"></div>
      </div>
      
      {/* Decorative elements */}
      <div className="mt-4 flex items-center space-x-1">
        <div className="h-1 w-1 rounded-full bg-brand-darkGreen"></div>
        <div className="h-0.5 w-10 bg-gradient-to-r from-transparent via-brand-darkGreen to-transparent"></div>
        <div className="h-2 w-2 rounded-full bg-brand-lightGreen/70"></div>
        <div className="h-0.5 w-16 bg-gradient-to-r from-brand-darkGreen to-transparent"></div>
        <div className="h-1 w-1 rounded-full bg-brand-darkGreen"></div>
      </div>
    </div>
  );
};

export default DurhamLogo;
