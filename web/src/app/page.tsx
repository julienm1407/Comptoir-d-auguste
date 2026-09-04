import { BrandDna } from "@/sections/BrandDna";
import { FeaturedDishes } from "@/sections/FeaturedDishes";
import { Hero } from "@/sections/Hero";
import { Location } from "@/sections/Location";
import { OrderModes } from "@/sections/OrderModes";

export default function HomePage() {
  return (
    <>
      <Hero />
      <OrderModes />
      <FeaturedDishes />
      <BrandDna />
      <Location />
    </>
  );
}
