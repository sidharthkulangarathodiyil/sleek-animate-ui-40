
import React from 'react';

const DurhamLogo = () => {
  return (
    <div className="flex flex-col items-center relative">
      <div className="relative z-10 group">
        <div className="absolute -inset-1 bg-gradient-to-r from-brand-darkGreen/20 via-brand-lightGreen/20 to-brand-darkGreen/20 rounded-lg blur-md opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
        <img 
          src="/lovable-uploads/db7cd2eb-44a5-4275-b03c-4afbd3ae22b1.png" 
          alt="Durham College Logo" 
          className="h-28 relative z-10 transition-all duration-300 group-hover:brightness-110"
        />
      </div>
      
      {/* Simple underline */}
      <div className="mt-2 w-full">
        <div className="h-0.5 w-full bg-gradient-to-r from-transparent via-brand-darkGreen to-transparent"></div>
      </div>
    </div>
  );
};

export default DurhamLogo;
