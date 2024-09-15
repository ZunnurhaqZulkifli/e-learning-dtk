import { Head } from '@inertiajs/react';
import { useState } from 'react';
import CarouselSlider from './Components/Carousel';

export default function Dashboard({ user, courses, stats }) {
  const [state, setstate] = useState();

  return (
    <>
      <CarouselSlider/>
      <div className="p-2">
        <Head>
          <title>Dashboard</title>
        </Head>

        <h1>Selamat Datang !</h1>
      </div>
    </>    
  );
}
