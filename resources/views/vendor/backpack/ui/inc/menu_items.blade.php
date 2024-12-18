{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="Authentication" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
<x-backpack::menu-item title="Users" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Students" icon="la la-user" :link="backpack_url('student')" />
<x-backpack::menu-item title="Teachers" icon="la la-user" :link="backpack_url('teacher')" />
<x-backpack::menu-item title="Courses" icon="la la-question" :link="backpack_url('course')" />
<x-backpack::menu-item title="Subjects" icon="la la-question" :link="backpack_url('subject')" />
<x-backpack::menu-item title="Images" icon="la la-question" :link="backpack_url('image')" />
<x-backpack::menu-item title="Images" icon="la la-question" :link="backpack_url('images')" />