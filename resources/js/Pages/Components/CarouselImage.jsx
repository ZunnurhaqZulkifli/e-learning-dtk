export function CarouselImage({ text, image }) {
  return (
    <img
      className="d-block w-100"
      src={`http://e-learning-dtk.test/`+ image}
      
      // alt={image}
    />
  );
}

export default CarouselImage;