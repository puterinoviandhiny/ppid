<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Manajemen User</a>
	<ul class="nav-dropdown-items">
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>User</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-file-o'></i> <span>Halaman</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('menu-item') }}'><i class='nav-icon la la-list'></i> <span>Menu</span></a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i>Berita</a>
    <ul class="nav-dropdown-items">
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('article') }}"><i class="nav-icon la la-newspaper-o"></i> Artikel</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-list"></i> Kategori</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-tag"></i> Tags</a></li>
    </ul>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('satker') }}'><i class='nav-icon la la-question'></i> Satuan Kerja</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('skpd') }}'><i class='nav-icon la la-question'></i> SKPD</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('permintaan') }}'><i class='nav-icon la la-question'></i> Permintaan Informasi</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('jenis_informasi') }}'><i class='nav-icon la la-question'></i> Jenis Informasi</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('link_terkait') }}'><i class='nav-icon la la-question'></i> Link Terkait</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pemohon') }}'><i class='nav-icon la la-question'></i> Pemohon</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('informasi-publik') }}'><i class='nav-icon la la-question'></i> Informasi Publik</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('jangka') }}'><i class='nav-icon la la-question'></i> Jangka waktu</a></li>
