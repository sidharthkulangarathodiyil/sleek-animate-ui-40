
import React from 'react';
import { cn } from "@/lib/utils";
import { Link } from 'react-router-dom';

interface NavButtonProps {
  to: string;
  label: string;
  icon: React.ReactNode;
  className?: string;
}

const NavButton = ({ to, label, icon, className }: NavButtonProps) => {
  return (
    <Link to={to} className={cn("nav-button group", className)}>
      <span className="inline-flex p-2 rounded-full bg-white/50 group-hover:bg-white group-hover:animate-[buttonPulse_1.5s_infinite] transition-colors duration-300">
        {React.cloneElement(icon as React.ReactElement, {
          className: "transition-transform duration-500 group-hover:scale-110"
        })}
      </span>
      <span className="font-medium transition-all duration-300 group-hover:translate-x-1">{label}</span>
    </Link>
  );
};

export default NavButton;
