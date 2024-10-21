export function CarouselImage({ text, image, appUrl }) {
  return (
    <img
      className="d-block w-100"
      src={appUrl + '/' +  image}

      // alt={image}
    />
  );
}

export default CarouselImage;