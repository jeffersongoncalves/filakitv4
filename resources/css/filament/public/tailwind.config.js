import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Public/**/*.php',
        './resources/views/filament/public/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
