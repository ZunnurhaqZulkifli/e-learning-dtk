export function CarouselImage({ text, image, appUrl }) {
  return (
    <div>
      <img
        className="d-block w-100"
        src={appUrl + '/' +  image}
        // alt={image}
      />
      <a href="" className="">
        {appUrl + '/' +  image}
      </a>
    </div>
  );
}

export default CarouselImage;