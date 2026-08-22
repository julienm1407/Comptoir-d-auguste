import { BrandDna } from "@/sections/BrandDna";
import { FeaturedDishes } from "@/sections/FeaturedDishes";
import { Hero } from "@/sections/Hero";
import { Location } from "@/sections/Location";
import { OrderModes } from "@/sections/OrderModes";
import { Reviews } from "@/sections/Reviews";

export default function HomePage() {
  return (
    <>
      <Hero />
      <OrderModes />
      <FeaturedDishes />
      <BrandDna />
      <Reviews />
      <Location />
    </>
  );
}
