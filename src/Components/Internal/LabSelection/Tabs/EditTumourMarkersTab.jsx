import React from 'react';
import Button from '@material-ui/core/Button';

const TumourMarkersTab = ({ history }) => {
    return (
        <table>
            <tbody>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/b-hcg-serum/')}
                            variant="outlined">
                            B-HCG serum
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ca-125/')}
                            variant="outlined">
                            CA 12.5
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ca-153/')}
                            variant="outlined">
                            CA 15.3
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/cea/')}
                            variant="outlined">
                            CEA
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ckmb/')}
                            variant="outlined">
                            CKMB
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/crp/')}
                            variant="outlined">
                            CRP
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/crp-ultrasensitive/')}
                            variant="outlined">
                            CRP UltraSensitive
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/m-alb/')}
                            variant="outlined">
                            M-Alb
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default TumourMarkersTab;
