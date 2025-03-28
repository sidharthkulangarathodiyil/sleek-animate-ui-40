
import React from 'react';
import { Loader2 } from 'lucide-react';

const LoadingScreen = () => {
  return (
    <div className="fixed inset-0 bg-white flex flex-col items-center justify-center z-50">
      <div className="relative">
        <div className="absolute -inset-4 bg-gradient-to-r from-brand-darkGreen/20 via-brand-lightGreen/20 to-brand-darkGreen/20 rounded-full blur-md animate-pulse"></div>
        <Loader2 className="h-12 w-12 text-[#721B43] animate-spin" />
      </div>
      <p className="mt-4 text-[#721B43] font-oswald uppercase tracking-wider text-lg">Loading</p>
      <div className="mt-2 w-32 h-1 bg-gray-200 rounded-full overflow-hidden">
        <div className="h-full bg-[#721B43] rounded-full animate-[loadingBar_2s_ease-in-out_infinite]"></div>
      </div>
    </div>
  );
};

export default LoadingScreen;
