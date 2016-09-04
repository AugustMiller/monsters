<? return function ($site, $pages, $page) {
  return [
    'monsters' => page('monsters')->children()->visible()
  ];
};
