let s:save_cpo = &cpo
set cpo&vim

if (!exists('g:phpcd_server_options'))
	let g:phpcd_server_options = {}
endif

if (!exists('g:phpcd_server_options.completion_match_type'))
	let g:phpcd_server_options.completion_match_type = 'head'
endif

let g:phpcd_need_update = 0

if (!exists('g:phpcd_insert_class_shortname'))
	let g:phpcd_insert_class_shortname = 0
endif

autocmd BufLeave,VimLeave *.php if g:phpcd_need_update > 0 | call phpcd#UpdateIndex() | endif
autocmd BufWritePost *.php let g:phpcd_need_update = 1

let &cpo = s:save_cpo
unlet s:save_cpo

autocmd CompleteDone *.php call phpcd#completeDone()

" vim: foldmethod=marker:noexpandtab:ts=2:sts=2:sw=2
