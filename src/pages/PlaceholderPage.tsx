
import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { ArrowLeft } from 'lucide-react';

interface PlaceholderPageProps {
  title: string;
  description: string;
  color: string;
}

const PlaceholderPage = ({ title, description, color }: PlaceholderPageProps) => {
  const location = useLocation();
  const path = location.pathname.substring(1); // Remove the leading slash

  return (
    <div className="min-h-screen flex items-center justify-center bg-brand-white">
      <div className="glassmorphism p-10 rounded-2xl max-w-md w-full text-center">
        <h1 className={`text-4xl font-bold mb-4 text-${color}`}>{title}</h1>
        <p className="text-xl text-brand-darkBrown mb-6">Path: ./{path}</p>
        <p className="mb-8 text-brand-darkBrown/70">
          {description}
        </p>
        <Link to="/" className="inline-flex items-center gap-2 nav-button bg-brand-darkGreen text-white hover:bg-brand-darkGreen/90">
          <ArrowLeft size={16} />
          Back to Jump Site
        </Link>
      </div>
    </div>
  );
};

export default PlaceholderPage;
