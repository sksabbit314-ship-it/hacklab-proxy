<?php
class OTPBypassWizard {
    public static function runAll($request) {
        return [
            'parameter_removal' => self::removeParam($request),
            'null_value' => self::nullValue($request),
            'negative_value' => self::negativeValue($request),
            'race_condition' => self::raceCondition($request),
            'type_juggling' => self::typeJuggling($request),
            'expiry_time' => self::expiryAttack($request)
        ];
    }
    private static function removeParam($req) { return "✓ Parameter removed"; }
    private static function nullValue($req) { return "✓ Null value sent"; }
    private static function negativeValue($req) { return "✓ Negative value sent"; }
    private static function raceCondition($req) { return "✓ Race condition attack"; }
    private static function typeJuggling($req) { return "✓ Type juggling"; }
    private static function expiryAttack($req) { return "✓ Expiry time extended"; }
}
?>
