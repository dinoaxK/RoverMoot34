<tr>
<td class="header">
<a href="{{ url('/') }}" style="width:100%;">
@if (trim($slot) === '34th National Moot Web')
<img src="https://lh3.googleusercontent.com/V45vful_lEwhsQ30cZUfLr7mHl4lEhr_0ytnSNyZSXR7XeEwIgH-6J67ubyBAkOo7FgAX915iHymb4bo_4hIaDeNeF0CJc96UeVoc6oNlxInF_r85oGlvR0xmWHKAJuwlqnOu1afxPeDex8msdJ5BlCNxiBNPEuD0sE9Ruhub21kuvKGtnO7AdY9oU19Nn9xrpMApUSdjEm6FP1J0ChyeWBoGUJ6lYPiHuYUMdNpanjaxd_jItiGVuiZwAfs5GFV0CDstzLm6m0qyWYXYbjDsDOnzqQUE5rvRu9UMK6PUv9tXy7BNITUbb6xUNKhOw5qQxa6WcyPly9zxknm1-l70QYD2ifwXZX91LSsJT4GeeOteTvsaAoxMvrhXcFhDTdmThnhJct-8FHrumA4RpYQq_TQMWM-alU9Qzk8EWYBez10pZaDtoXQrXTzcoW3lVKr30yfLrzINNlZ9fgCYtLzNnoMZI6UgAtytYGn4kk3Q647H14P74YvEwEt08lySGhLD3M5rrs5SOa56pGOD8ARVax9Ju_SgOslRJflC9Qc7lo8HNsAXnTWZ5sG7Xa1CnPrv7T1_L2hbCYaamGWH4aT0at9FX73o2xUQZctkH78YCinKcouYAQihfoXNzYRmMurg_5uefjVQ3j9mNOLBZL4I_HehipZ5rq8J_QIiNJuSdPjqFps5_G4MLYKTig=w1440-h582-no?authuser=6" class="logo" alt="Moot Email Banner">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>