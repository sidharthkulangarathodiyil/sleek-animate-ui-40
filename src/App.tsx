
import { Toaster } from "@/components/ui/toaster";
import { Toaster as Sonner } from "@/components/ui/sonner";
import { TooltipProvider } from "@/components/ui/tooltip";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Index from "./pages/Index";
import NotFound from "./pages/NotFound";
import PlaceholderPage from "./pages/PlaceholderPage";

const queryClient = new QueryClient();

const App = () => (
  <QueryClientProvider client={queryClient}>
    <TooltipProvider>
      <Toaster />
      <Sonner />
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Index />} />
          
          {/* Left Section Routes */}
          <Route path="/dc-psa" element={
            <PlaceholderPage 
              title="Durham College PSA" 
              description="This page will contain the Durham College Public Service Announcement content."
              color="brand-darkGreen" 
            />
          } />
          <Route path="/best-buy" element={
            <PlaceholderPage 
              title="Best Buy" 
              description="This page will contain the Best Buy content."
              color="brand-darkGreen" 
            />
          } />
          <Route path="/burger-king" element={
            <PlaceholderPage 
              title="Burger King" 
              description="This page will contain the Burger King content."
              color="brand-darkGreen" 
            />
          } />
          
          {/* Center Section Routes */}
          <Route path="/comp" element={
            <PlaceholderPage 
              title="COMP (Assignment 04)" 
              description="This page will display Assignment 04 content."
              color="brand-darkBrown" 
            />
          } />
          <Route path="/logo" element={
            <PlaceholderPage 
              title="Logo Pane (Assignment 06)" 
              description="This page will display the Logo Pane for Assignment 06."
              color="brand-darkBrown" 
            />
          } />
          <Route path="/news" element={
            <PlaceholderPage 
              title="News & Ticker Tape (Assignment 07)" 
              description="This page will display the News & Ticker Tape for Assignment 07."
              color="brand-darkBrown" 
            />
          } />
          <Route path="/weather" element={
            <PlaceholderPage 
              title="Weather Pane (Assignment 08)" 
              description="This page will display the Weather Pane for Assignment 08."
              color="brand-darkBrown" 
            />
          } />
          
          {/* Right Section Routes */}
          <Route path="/admin" element={
            <PlaceholderPage 
              title="Admin Panel" 
              description="This page will provide administrative controls and settings."
              color="brand-darkPink" 
            />
          } />
          <Route path="/motion-graphics" element={
            <PlaceholderPage 
              title="Motion Graphics Pane" 
              description="This page will display motion graphics content."
              color="brand-red" 
            />
          } />
          <Route path="/youtube" element={
            <PlaceholderPage 
              title="YouTube Pane" 
              description="This page will display embedded YouTube content."
              color="brand-orange" 
            />
          } />
          <Route path="/final" element={
            <PlaceholderPage 
              title="Final" 
              description="This page will display the final project content."
              color="brand-yellow" 
            />
          } />
          
          {/* Catch-all route */}
          <Route path="*" element={<NotFound />} />
        </Routes>
      </BrowserRouter>
    </TooltipProvider>
  </QueryClientProvider>
);

export default App;
