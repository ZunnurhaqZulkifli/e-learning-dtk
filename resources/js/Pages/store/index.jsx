import MasterLayout from "../master-layout";
import CoursesCatalogue from '../dashboards/dashboard-catalogue';

export default function StoreFrontPage({ courses }) {
    return (
        <MasterLayout>
            <CoursesCatalogue courses={courses} isListing={true} />
        </MasterLayout>
    );
}