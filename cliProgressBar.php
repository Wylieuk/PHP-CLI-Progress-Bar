function cliProgressBar(int $baseWidth, float $percent, string $label = '') :string{

        if (PHP_SAPI !== 'cli' && isset($_SERVER['HTTP_HOST'])) {
            return '';
        }
        $minPercent = $percent >= 1 ? $percent: 1;

        $fullBarPortion = str_repeat("\033[96m#", max(0, ceil(($baseWidth/100)*$minPercent)));
        $emptybarPortion = str_repeat("\033[36m.", max(0, ($baseWidth - ceil(($baseWidth/100)*$minPercent))));
        $barEndLeft = "\033[96m[";
        $barEndRight = "\033[96m]";

        $label = str_pad($label, 30, ' ');

        return "\r".$barEndLeft.$fullBarPortion.$emptybarPortion.$barEndRight.' '.str_pad(number_format($percent, 2), 6, ' ', STR_PAD_LEFT)."% {$label}"."\033[39m";

    }
