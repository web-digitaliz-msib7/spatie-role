<?php
function formatCurrency($amount)
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
