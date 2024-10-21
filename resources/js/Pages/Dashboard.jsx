import CarouselSlider from './Components/Carousel';
import CoursesStats from './Components/CoursesStats';
import CoursesCatalogue from './DashboardCatalogue';
import MasterLayout from './MasterLayout';

export default function Dashboard({ user, courses, stats, images }) {
  return (
    <>
      <CarouselSlider images={images} />

      <MasterLayout>
          <div className='p-4'>
            <h1>Selamat Datang !</h1>
            <h6 className='text-justify'>
              Selamat datang ke portal e-pembelajaran dalam talian kami, sebuah platform yang direka khas untuk membantu anda mencapai kejayaan akademik dan profesional dengan cara yang mudah dan interaktif. Di sini, anda akan dapat
              mengakses pelbagai kursus berkualiti tinggi, modul pembelajaran interaktif, dan bahan pendidikan yang dikemas kini secara berkala. Dengan menggunakan teknologi terkini, kami berusaha untuk memberikan anda pengalaman pembelajaran
              yang menyeronokkan, fleksibel, dan berkesan, di mana sahaja anda berada. Terima kasih kerana memilih kami sebagai rakan pembelajaran anda, dan kami berharap anda berjaya dalam setiap langkah perjalanan anda!
            </h6>
          </div>

          {
              (user == null) ? (
                <div className='p-4'>
                  <CoursesCatalogue courses={courses} />
                </div>
              ) : (
                <>
                  <div className="p-4">
                    <CoursesStats stats={stats} />
                  </div>
                </>
              )
            }
      </MasterLayout>
    </>
  );
}