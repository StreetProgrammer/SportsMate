
<p>

	@if (session('lang') == 'ar')
		{{ \App\Model\Area\Governorate::find($a_governorate_id)->g_ar_name }}

	@elseif(session('lang') == 'en')
		{{ \App\Model\Area\Governorate::find($a_governorate_id)->g_en_name }}
	@endif
</p>