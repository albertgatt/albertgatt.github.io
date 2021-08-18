<?php
@define('BIBTEXBROWSER_DEFAULT_DISPLAY','SimpleDisplay');

@define('BIBTEXBROWSER_ROBOTS_NOINDEX',false);

@define('BIBTEXBROWSER_AUTHOR_LINKS','none');

@define('BIBTEXBROWSER_LAYOUT','definition');

// should pdf, doi, url, gsid links be opened in a new window?
@define('BIBTEXBROWSER_LINKS_TARGET','_blank');// can be _blank (new window), _top (with frames)

@define('ABBRV_TYPE','index');// may be year/x-abbrv/key/none/index/keys-index

// how to print authors names?
// default => as in the bibtex file
// USE_COMMA_AS_NAME_SEPARATOR_IN_OUTPUT = true => "Meyer, Herbert"
// USE_INITIALS_FOR_NAMES = true => "Meyer H"
// USE_FIRST_THEN_LAST => Herbert Meyer
@define('USE_COMMA_AS_NAME_SEPARATOR_IN_OUTPUT',true);// output authors in a comma separated form, e.g. "Meyer, H"?
@define('USE_INITIALS_FOR_NAMES',true); // use only initials for all first names?
@define('USE_FIRST_THEN_LAST',false); // use only initials for all first names?
@define('FORCE_NAMELIST_SEPARATOR', ''); // if non-empty, use this to separate multiple names regardless of USE_COMMA_AS_NAME_SEPARATOR_IN_OUTPUT
@define('LAST_AUTHOR_SEPARATOR',' and ');

// do we add [bibtex] links ?
@define('BIBTEXBROWSER_BIBTEX_LINKS',true);
// do we add [pdf] links ?
@define('BIBTEXBROWSER_PDF_LINKS',false);
// do we add [doi] links ?
@define('BIBTEXBROWSER_DOI_LINKS',true);
// do we add [gsid] links (Google Scholar)?
@define('BIBTEXBROWSER_GSID_LINKS',true);

//new by ag - for preprints
@define('BIBTEXBROWSER_PREPRINT_LINKS',true);

//new by ag - for supplementary material
@define('BIBTEXBROWSER_SUPP_LINKS',true);

?>