import AppLogoProps, { size } from "@/app/types/AppLogoProps";
import Image from "next/image";

export default function AppLogo(props: AppLogoProps) {
  const widthAndHight: {
    width?: number;
    height?: number;
  } = {};

  if (props.size === size.sm) {
    widthAndHight.width = 30;
    widthAndHight.height = 30;
  }

  if (props.size === size.md) {
    widthAndHight.width = 50;
    widthAndHight.height = 50;
  }

  if (props.size === size.lg) {
    widthAndHight.width = 70;
    widthAndHight.height = 70;
  }

  if (props.size === size.xl) {
    widthAndHight.width = 90;
    widthAndHight.height = 90;
  }

  return (
    <Image
      {...widthAndHight}
      src="/images/png/pet-shop.png"
      alt="Logotipo do pet shop"
    />
  );
}
