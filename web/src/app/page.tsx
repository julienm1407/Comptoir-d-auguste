import { BrandDna } from "@/sections/BrandDna";
import { FeaturedDishes } from "@/sections/FeaturedDishes";
import { Hero } from "@/sections/Hero";
import { Location } from "@/sections/Location";
import { MenuPreview } from "@/sections/MenuPreview";
import { OrderModes } from "@/sections/OrderModes";
import { Reviews } from "@/sections/Reviews";

export default function HomePage() {
  return (
    <>
      <Hero />
      <OrderModes />
      <MenuPreview />
      <FeaturedDishes />
      <BrandDna />
      <Reviews />
      <Location />
    </>
  );
}
