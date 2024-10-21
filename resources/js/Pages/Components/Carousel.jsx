import Carousel from 'react-bootstrap/Carousel';
import CarouselImage from '../Components/CarouselImage';

function CarouselSlider({ images }) {
  return (
    <Carousel fade>
      <Carousel.Item>
        <CarouselImage text="First slide" image={ images[0] }/>
      </Carousel.Item>
      <Carousel.Item>
        <CarouselImage text="Second slide" image={ images[1] }/>
      </Carousel.Item>
      <Carousel.Item>
        <CarouselImage text="Third slide" image={ images[2] }/>
      </Carousel.Item>
    </Carousel>
  );
}

export default CarouselSlider;