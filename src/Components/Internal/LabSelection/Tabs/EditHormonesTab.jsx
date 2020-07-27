import React from 'react';
import Button from '@material-ui/core/Button';

const HormonesTab = ({ history }) => {
    return (
        <table>
            <tbody>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/alpha-feto-protein')}
                            variant="outlined">
                            Alpha Feto protein
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/cortisol')}
                            variant="outlined">
                            cortisol
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/estrogen')}
                            variant="outlined">
                            estrogen
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hormonal-assay')}
                            variant="outlined">
                            hormonal assay
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/psa')}
                            variant="outlined">
                            PSA
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/pth')}
                            variant="outlined">
                            PTH
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/reproductive-assay')}
                            variant="outlined">
                            reproductive assay
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/tft')}
                            variant="outlined">
                            TFT
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td colSpan="2">
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/troponin')}
                            variant="outlined">
                            troponin
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default HormonesTab;
