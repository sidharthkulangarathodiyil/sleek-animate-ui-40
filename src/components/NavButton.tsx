
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
      <span className="inline-flex p-2 rounded-full bg-white/50 group-hover:bg-white transition-colors duration-300">
        {icon}
      </span>
      <span className="font-medium">{label}</span>
    </Link>
  );
};

export default NavButton;
