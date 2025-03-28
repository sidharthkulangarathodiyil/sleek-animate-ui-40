
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
    <Link to={to} className={cn("nav-button", className)}>
      {icon}
      <span>{label}</span>
    </Link>
  );
};

export default NavButton;
