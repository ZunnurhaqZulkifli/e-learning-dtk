import { Head } from '@inertiajs/react';
import { useState } from 'react';
import CarouselSlider from './Components/Carousel';
import CoursesStats from './Components/CoursesStats';
import CoursesLists from './Components/CoursesLists';

export default function Dashboard({ user, courses, stats }) {
const [state, setstate] = useState();

return (
<>
    <CarouselSlider />
    <div className="p-2">
        <h1>Selamat Datang !</h1>
        <h6 className='text-justify'>
            Selamat datang ke portal e-pembelajaran dalam talian kami, sebuah platform yang direka khas untuk membantu anda mencapai kejayaan akademik dan profesional dengan cara yang mudah dan interaktif. Di sini, anda akan dapat
            mengakses pelbagai kursus berkualiti tinggi, modul pembelajaran interaktif, dan bahan pendidikan yang dikemas kini secara berkala. Dengan menggunakan teknologi terkini, kami berusaha untuk memberikan anda pengalaman pembelajaran
            yang menyeronokkan, fleksibel, dan berkesan, di mana sahaja anda berada. Terima kasih kerana memilih kami sebagai rakan pembelajaran anda, dan kami berharap anda berjaya dalam setiap langkah perjalanan anda!
        </h6>

        {
          user != null ? (
            <CoursesStats/>
          ) : (
            < CoursesLists courses={courses} />
          )
        }
    </div>
</>
);
}
