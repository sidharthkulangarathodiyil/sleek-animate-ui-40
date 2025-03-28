
import { useLocation, Link } from "react-router-dom";
import { useEffect } from "react";
import { ArrowLeft } from "lucide-react";

const NotFound = () => {
  const location = useLocation();

  useEffect(() => {
    console.error(
      "404 Error: User attempted to access non-existent route:",
      location.pathname
    );
  }, [location.pathname]);

  return (
    <div className="min-h-screen flex items-center justify-center bg-brand-white">
      <div className="glassmorphism p-10 rounded-2xl max-w-md w-full text-center">
        <h1 className="text-4xl font-bold mb-4 text-brand-darkGreen">404</h1>
        <p className="text-xl text-brand-darkBrown mb-6">Page not found</p>
        <p className="mb-8 text-brand-darkBrown/70">
          The page you're looking for doesn't exist or has been moved.
        </p>
        <Link to="/" className="inline-flex items-center gap-2 nav-button bg-brand-darkGreen text-white hover:bg-brand-darkGreen/90">
          <ArrowLeft size={16} />
          Return to Jump Site
        </Link>
      </div>
    </div>
  );
};

export default NotFound;
